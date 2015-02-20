<?php namespace Anomaly\SettingsModule;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class SettingsModuleRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting
 */
class SettingsModuleRouteProvider extends RouteServiceProvider
{

    /**
     * Map the system setting routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/settings',
            function () {
                return redirect('admin/settings/system');
            }
        );

        $router->any(
            'admin/settings/system',
            'Anomaly\SettingsModule\Http\Controller\Admin\SettingsController@edit'
        );

        $router->any(
            'admin/settings/integrations',
            'Anomaly\SettingsModule\Http\Controller\Admin\SettingsController@integrations'
        );
    }
}
