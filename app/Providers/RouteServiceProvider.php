<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router, Request $request)
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes($router, $request);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes($router, $request)
    {
        //If no langauges appear in the url, use the default language
        $locale = $request->segment(1);
        if (!array_key_exists($locale, config('app.locales')))
        {
            $locale = config('app.fallback_locale');
        }

        $this->app->setLocale($locale);

        /*$router->group(['namespace' => $this->namespace, 'prefix' => $locale], function($router) {
            require app_path('Http/routes.php');
        });*/

        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
            'prefix' => $locale,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
