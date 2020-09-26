<?php

namespace Bett\Http\Controllers\Admin;

use Bett\Forecast;
use Bett\Http\Controllers\SiteController;
use Bett\Http\Requests\ForecastsRequest;
use Bett\Mail\ForecastAdd;
use Bett\Sort;
use Bett\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForecastsController extends SiteController
{
    private $supportedMethods = [
        'PastTime',
        'Free',
        'Paid',
        'NotStatus'
    ];
    public function __construct()
    {
        $this->template = 'admin.forecasts.frame';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filterData['filter'] = [];


        $forecasts = Forecast::orderBy('date','DESC');

        $search = request()->input('search');
        if(!empty($search)){
            $forecasts->where('game', 'LIKE', '%' . $search . '%')
                      ->orWhere('match', 'LIKE', '%' . $search . '%')
                      ->orWhere('date', 'LIKE', '%' . $search . '%')
                      ->orWhere('express', 'LIKE', '%' . $search . '%');
        }

        $data = request()->input('filter');
        if($data != null) {
            if (count($data) > 0) {
                foreach ($data as $datum) {
                    if (in_array($datum, $this->supportedMethods)) {
                        $filterData['filter'][] = $datum;
                        $forecasts = $forecasts->$datum();
                    }
                }
            }
        }




        $forecasts = $forecasts->paginate(10)->appends($filterData);

        $this->vars['content'] = view('admin/forecasts.index')->with(['search'=>$search,'forecasts' => $forecasts, 'sort'=>Sort::class, 'filter'=>$filterData['filter']])->render();

        return $this->renderOutput();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sorts = Sort::all();
        $forecasters = User::IsForecaster(1)->get();
        $this->vars['content'] = view('admin/forecasts.create')->with(['sorts' => $sorts, 'forecasters'=>$forecasters])->render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForecastsRequest $request)
    {
        $data = $request->except('_token');

        $date = $data['date'];
        if($data['sort_ord']==1 ){
            $date = min($data['express']['date']);
        }

        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }

        $forecast_check = Forecast::where('alias', $data['alias'])->first();
        if(isset($forecast_check->id)){
            return redirect()->back()->withErrors(['error' => 'Данный URL уже используется']);
        }

        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date);

        $forecast = new Forecast();
        $forecast->alias = $data['alias'];
        $forecast->sort_id = $data['sort_id'];
        $forecast->sort_ord = $data['sort_ord'];
        $forecast->game = $data['game'];
        $forecast->match = $data['match'];
        $forecast->coeff = $data['coeff'];
        $forecast->forecast = $data['forecast'];
        $forecast->date = $date;
        $forecast->price = $data['price'];
        $forecast->description = $data['description'];
        $forecast->paid = $data['paid'];
        $forecast->title = $data['title'];
        $forecast->meta_keywords = $data['meta_keywords'];
        $forecast->meta_description = $data['meta_description'];
        $forecast->express = $data['express'];
        $forecast->forecaster_id = $data['forecaster_id'];

        if($forecast->save()){
            $this->sitemapGenerate();
            return redirect()->route('forecasts.index')->with('status', 'Прогноз успешно добавлен!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forecast = Forecast::find($id);
        $sorts = Sort::all();
        $forecasters = User::IsForecaster(1)->get();
        $this->vars['content'] = view('admin/forecasts.edit')->with(['forecast'=>$forecast, 'forecasters'=>$forecasters, 'sorts' => $sorts])->render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ForecastsRequest $request, $id)
    {
        $data = $request->except('_token');

        $date = $data['date'];

        if($data['sort_ord']==1){
            $date = min($data['express']['date']);
        }


        if(empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }

        $forecast_check = Forecast::find($id);
        $result = Forecast::where('alias', $data['alias'])->first();
        if(isset($result->id) && ($result->id != $forecast_check->id)){
            return redirect()->back()->withErrors(['error' => 'Данный URL уже используется']);
        }

        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date);

        $forecast = Forecast::find($id);
        $forecast->alias = $data['alias'];
        $forecast->sort_id = $data['sort_id'];
        $forecast->sort_ord = $data['sort_ord'];
        $forecast->game = $data['game'];
        $forecast->match = $data['match'];
        $forecast->coeff = $data['coeff'];
        $forecast->forecast = $data['forecast'];
        $forecast->result = $data['result'];
        $forecast->date = $date;
        $forecast->price = $data['price'];
        $forecast->paid = $data['paid'];
        $forecast->description = $data['description'];
        $forecast->title = $data['title'];
        $forecast->meta_keywords = $data['meta_keywords'];
        $forecast->meta_description = $data['meta_description'];
        $forecast->express = $data['express'];
        $forecast->forecaster_id = $data['forecaster_id'];

        if($forecast->update()){
            $this->sitemapGenerate();
            if($data['submit']==1){
                return redirect()->back()->with('status', 'Прогноз успешно обновлен!');
            }

            return redirect()->route('forecasts.index')->with('status', 'Прогноз успешно обновлен!');
        }

    }

    /**
     * Update Result
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateResult(Request $request, $id)
    {
        $result = $request->except('_token')['data'];

        $forecast = Forecast::find($id);
        if($forecast){
            $forecast->result = $result;
            if($forecast->save()){
                return response()->json(['success'=>'true'], 200);
            }
        }

        return response()->json(['error'], 500);
    }


    /**
     * @param $id
     * @param $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id, $status)
    {
        $forecast = Forecast::find($id);
        $forecast->status = $status;
        $forecast->save();

        return redirect()->back();
    }

    /**
     * @param $id
     * @param $paid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePaid($id, $paid)
    {
        $forecast = Forecast::find($id);
        $forecast->paid = $paid;
        $forecast->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forecast = Forecast::find($id);

        if($forecast->delete()){
            $this->sitemapGenerate();
            return redirect()->back()->with('status', 'Прогноз успешно удален');
        }

    }
}
