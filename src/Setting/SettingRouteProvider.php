<?php namespace Anomaly\SettingsModule\Setting;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class SettingRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting
 */
class SettingRouteProvider extends RouteServiceProvider
{

    /**
     * Map the setting routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any('admin/settings', 'Anomaly\SettingsModule\Http\Controller\Admin\SettingsController@edit');
    }
}
