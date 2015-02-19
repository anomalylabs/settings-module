<?php namespace Anomaly\SettingsModule\Setting;

use Illuminate\Support\ServiceProvider;

/**
 * Class SettingServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting
 */
class SettingServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\SettingsModule\Setting\SettingModel',
            'Anomaly\SettingsModule\Setting\SettingModel'
        );

        $this->app->singleton(
            'Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface',
            'Anomaly\SettingsModule\Setting\SettingRepository'
        );

        $this->app->register('Anomaly\SettingsModule\Setting\SettingRouteProvider');
    }
}
