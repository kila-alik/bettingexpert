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

                      // $this->publishes(
                      //     [
                      //         asset(env('THEME')) . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'ckeditor.js' => public_path('vendor' . DIRECTORY_SEPARATOR . 'unisharp' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'ckeditor.js'),
                      //         __DIR__ . DIRECTORY_SEPARATOR . 'config.js' => public_path('vendor' . DIRECTORY_SEPARATOR . 'unisharp' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'config.js'),
                      //         __DIR__ . DIRECTORY_SEPARATOR . 'styles.js' => public_path('vendor' . DIRECTORY_SEPARATOR . 'unisharp' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'styles.js'),
                      //         __DIR__ . DIRECTORY_SEPARATOR . 'contents.css' => public_path('vendor' . DIRECTORY_SEPARATOR . 'unisharp' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'contents.css'),
                      //         __DIR__ . DIRECTORY_SEPARATOR . 'adapters' => public_path('vendor' . DIRECTORY_SEPARATOR . 'unisharp' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'adapters'),
                      //         __DIR__ . DIRECTORY_SEPARATOR . 'lang' => public_path('vendor' . DIRECTORY_SEPARATOR . 'unisharp' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'lang'),
                      //         __DIR__ . DIRECTORY_SEPARATOR . 'skins' => public_path('vendor' . DIRECTORY_SEPARATOR . 'unisharp' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'skins'),
                      //         __DIR__ . DIRECTORY_SEPARATOR . 'plugins' => public_path('vendor' . DIRECTORY_SEPARATOR . 'unisharp' . DIRECTORY_SEPARATOR . 'laravel-ckeditor' . DIRECTORY_SEPARATOR . 'plugins'),
                      //     ],
                      //     'ckeditor'
                      // );

                      // $this->publishes(
                      //     [
                      //         __DIR__ . '/ckeditor.js' => public_path('vendor/unisharp/laravel-ckeditor/ckeditor.js'),
                      //         __DIR__ . '/config.js' => public_path('vendor/unisharp/laravel-ckeditor/config.js'),
                      //         __DIR__ . '/styles.js' => public_path('vendor/unisharp/laravel-ckeditor/styles.js'),
                      //         __DIR__ . '/contents.css' => public_path('vendor/unisharp/laravel-ckeditor/contents.css'),
                      //         __DIR__ . '/adapters' => public_path('vendor/unisharp/laravel-ckeditor/adapters'),
                      //         __DIR__ . '/lang' => public_path('vendor/unisharp/laravel-ckeditor/lang'),
                      //         __DIR__ . '/skins' => public_path('vendor/unisharp/laravel-ckeditor/skins'),
                      //         __DIR__ . '/plugins' => public_path('vendor/unisharp/laravel-ckeditor/plugins'),
                      //     ],
                      //     'ckeditor'
                      // );
    }
}
