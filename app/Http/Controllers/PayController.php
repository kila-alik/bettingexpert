<?php

namespace Bett\Http\Controllers;

use Bett\Forecast;
use Bett\Payment;
use Bett\Subscription;
use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Parser;
use Bett\User;

class PayController extends SiteController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function buySubscription(Request $request)
    {
        $id = $request->only('id')['id'];

        $user = Auth::user();

        $subscriptions = new Subscription();
        $subscriptions = $subscriptions->subscriptions;

        if(array_key_exists($id, $subscriptions) && isset($user->id)) {

            $order_amount = $subscriptions[$id]['price'];

            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->amount = $order_amount;
            $payment->subscription_id = $id;

            if($order_amount > 0) {
                if ($payment->save()) {
                    $order_id = $payment->id;
                    $sign = md5($this->merchant_id . ':' . $order_amount . ':' . $this->secret_word . ':' . $order_id);
                    $auth_email = Auth()->user()->email ? Auth()->user()->email : 'email@email.com';
                    return redirect()->away('http://www.free-kassa.ru/merchant/cash.php?m=' . $this->merchant_id . '&oa=' . $order_amount . '&o=' . $order_id . '&s=' . $sign . '&em=' . $auth_email . '');
                }
            }

            return redirect()->back();
        }

        return abort(404);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function buy(Request $request)
    {

        $data = $request->except('_token');

        $validator = Validator::make($data, [
            'id' => 'required|exists:forecasts'
        ]);

        if($validator->fails()){
            return abort(404);
        }

        $forecast = Forecast::find($data['id']);
        $user = Auth::user();

        if($forecast && !$user->forecasts()->find($data['id']) && $forecast->paid===0) {
            $order_amount = $forecast->price;

            $payment = new Payment();
            $payment->user_id = Auth()->user()->id;
            $payment->amount = $order_amount;
            $payment->forecast_id = $forecast->id;

            if($order_amount > 0) {
                if ($payment->save()) {
                    $order_id = $payment->id;
                    $sign = md5($this->merchant_id . ':' . $order_amount . ':' . $this->secret_word . ':' . $order_id);
                    return redirect()->away('http://www.free-kassa.ru/merchant/cash.php?m=' . $this->merchant_id . '&oa=' . $order_amount . '&o=' . $order_id . '&s=' . $sign . '&em=' . Auth()->user()->email . '');
                }
            }

            return redirect()->back();
        }

        return abort(404);
    }


    /**
     * @param Request $request
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function payCheck(Request $request){
        if (!in_array($request->ip(), $this->fk_ip_address)) {
            return abort(404); // Hacking attempt
        }

        $req_data = $request->all();

        $validator = Validator::make($req_data, [
            'MERCHANT_ID' => 'required',
            'MERCHANT_ORDER_ID' => 'required',
            'intid' => 'required',
            'CUR_ID' => 'required',
            'SIGN' => 'required',
            'AMOUNT' => 'required',
        ]);


        if($validator->fails()){
            return abort(404); // Validator Error
        }

        $sign = md5($this->merchant_id.':'.$req_data['AMOUNT'].':'.$this->secret_word2.':'.$req_data['MERCHANT_ORDER_ID']);

        if ($sign != $req_data['SIGN']) {
            return abort(404); // Wrong sign
        }


        $payment = Payment::find($req_data['MERCHANT_ORDER_ID']);
        if($payment->id && $payment->fk_intid==NULL && ($payment->fk_intid!=$req_data['intid'])){

            if($payment->amount == $req_data['AMOUNT']){

                $client = new GuzzleHttp\Client();
                $res = $client->request('POST','http://www.free-kassa.ru/api.php',[
                    'form_params' => [
                        'merchant_id' => $this->merchant_id,
                        's' => md5($this->merchant_id.$this->secret_word2),
                        'intid' => $req_data['intid'],
                        'action' => 'check_order_status',
                    ]
                ]);

                if($res->getStatusCode() == 200) {

                    $xml_res =  $res->getBody();
                    $finial_res = Parser::xml($xml_res);

                    if(isset($finial_res['status']) && $finial_res['status']=='completed'){
                        $payment->fk_intid = $finial_res['intid'];
                        $payment->cur_id = $req_data['CUR_ID'];
                        $payment->sign = $sign;

                        if(isset($req_data['P_EMAIL'])) {
                            $payment->p_email = $req_data['P_EMAIL'];
                        }

                        if(isset($req_data['P_PHONE'])) {
                            $payment->p_phone = $req_data['P_PHONE'];
                        }

                        if($payment->save()){
                            $user = User::find($payment->user_id);

                            /*
                             * Subscription
                             */
                            if($payment->subscription_id != 0){
                                $subscription = new Subscription();
                                $subscription->user_id = $user->id;
                                $subscription->subscription_id = $payment->subscription_id;

                                if($subscription->save()){
                                    return redirect()->route('home');
                                }

                            // Prognoz
                            }else {
                                $forecast = Forecast::find($payment->forecast_id);

                                if ($user->forecasts()->save($forecast)) {
                                    return redirect()->route('forecast', $payment->forecast_id);
                                }
                            }

                        }
                    }

                }

            }

        }else{
            return abort(404);
        }
    }

    /**
     * @return string
     */
    public function paySuccess(){
        return 'Pay Success';
    }

    /**
     * @return string
     */
    public function payError()
    {
        return 'Pay Error';
    }
}
