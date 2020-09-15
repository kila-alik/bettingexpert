<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public $subscriptions = [
        1 => ['duration' => 1, 'name'=>'1 день', 'price'=>'899'],
        2 => ['duration' => 7, 'name'=>'1 неделая', 'price'=>'2799'],
        3 => ['duration' => 14, 'name'=>'2 неделая', 'price'=>'3899'],
        4 => ['duration' => 30, 'name'=>'1 месяц', 'price'=>'5799']
    ];

    public function scopeSubscriptionCheck()
    {
        $user = auth()->user();
        if(!$user){
            return false;
        }

        $subscriptions = Subscription::where('user_id', $user->id)->get();

        $minutesPast = $minutesEnd =  0;

        if(count($subscriptions) > 0) {
            foreach ($subscriptions as $item) {

                if(!array_key_exists($item->subscription_id, $this->subscriptions)){
                    return false;
                }

                $created = new Carbon($item->created_at);
                $now = Carbon::now();

                if($created->diffInMinutes($now) < $this->subscriptions[$item->subscription_id]['duration'] * 24 * 60) {
                    $minutesPast += $created->diffInMinutes($now);
                    $minutesEnd += $this->subscriptions[$item->subscription_id]['duration'] * 24 * 60;
                }

            }
        }

        $minutesGet = ( $minutesEnd-$minutesPast)*60;
        $cBonD = gmdate("d", $minutesGet)-1;
        $datePast = $cBonD.' день '.gmdate("H часа i минут", $minutesGet);

        if($minutesEnd > $minutesPast) {
            return $datePast;
        }

        return false;
    }
}