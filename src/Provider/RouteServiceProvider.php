<?php namespace Anomaly\Streams\Addon\Module\Settings\Provider;

use Illuminate\Routing\Router;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{

    /**
     * The controllers to scan for route annotations.
     *
     * @var array
     */
    protected $scan = [];

    /**
     * All of the module's route middleware keys.
     *
     * @var array
     */
    protected $middleware = [];

    /**
     * Called before routes are registered.
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function before()
    {
        //
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->get(
            'admin/settings',
            function () {
                return redirect('admin/settings/modules');
            }
        );

        $router->any(
            'admin/settings/{type}',
            'Anomaly\Streams\Addon\Module\Settings\Http\Admin\SettingsController@index'
        );
        $router->any(
            'admin/settings/{type}/{slug}',
            'Anomaly\Streams\Addon\Module\Settings\Http\Admin\SettingsController@edit'
        );
    }
}
 