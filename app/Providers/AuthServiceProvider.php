<?php

namespace App\Providers;

use App\Subscription;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerForecastPolices();
    }


    public function registerForecastPolices()
    {

        Gate::define('forecast-show', function($user, $forecast){
            if(Auth::check()){
                $user_check = $user->forecasts()->where('forecast_id', $forecast->id)->count();
            }

            if($forecast->status===0 && $forecast->paid===0 && $user_check === 1) {
               return true;
            }elseif($forecast->status != 0 || $forecast->paid === 1 || Subscription::subscriptionCheck()) {
                return true;
            }

            return false;
        });

        Gate::define('subscription-check', function(){
            $subscription = new Subscription;
            return $subscription->subscriptionCheck();
        });
    }
}
