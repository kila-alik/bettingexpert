<?php

namespace Bett\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Jenssegers\Date\Date;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                      DB::listen(function ($query){
                            // dump($query->sql);
                      });

                      Date::setlocale(config('app.locale'));
    }
}
