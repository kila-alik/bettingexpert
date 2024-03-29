<?php

namespace Bett\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Bett\ForecastModel;
use Bett\Policies\ForecastPolicy;

use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Forecast::class => ForecastPolicy::class,
        // 'Bett\Model' => 'Bett\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    // public function boot()
    public function boot(Gate $gate)
    {
        // $this->registerPolicies();
        $this->registerPolicies($gate);

          $gate->define('list-menu', function ($user) {
              // return $user->id == $post->user_id;
              if(Auth::check() && Auth::user()->is_admin == '1') {
              return TRUE;
              }
          return FALSE;
        });
    }
}
