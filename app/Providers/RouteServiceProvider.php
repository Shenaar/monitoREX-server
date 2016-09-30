<?php

namespace App\Providers;

use Illuminate\Routing\Router;
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

    protected $namespaceApi = 'App\Http\Controllers\Api';

    protected $namespaceFrontendApi = 'App\Http\Controllers\FrontendApi';

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
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group(
            [
            'namespace' => $this->namespaceApi,
            'prefix'     => 'api',
            'middleware' => 'web',
            ], function ($router) {
                include base_path('routes/api.php');
            }
        );

        $router->group(
            [
            'namespace' => $this->namespaceFrontendApi,
            'prefix'     => 'frontend/api',
            'middleware' => 'web',
            ], function ($router) {
                include base_path('routes/frontend_api.php');
            }
        );
    }
}
