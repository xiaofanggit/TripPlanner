<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //$transURL = str_replace($this->app->getLocale(), trans('messages.lang'), Request::url());
        //view()->share('transURL', $transURL);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
