<?php namespace Anomaly\SettingsModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class SettingsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule
 */
class SettingsModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Setting services.
        $this->app->bind(
            'Anomaly\SettingsModule\Setting\SettingModel',
            'Anomaly\SettingsModule\Setting\SettingModel'
        );

        $this->app->singleton(
            'Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface',
            'Anomaly\SettingsModule\Setting\SettingRepository'
        );

        if (env('INSTALLED')) {
            $this->app->register('Anomaly\SettingsModule\SettingsModuleEventProvider');
        }

        $this->app->register('Anomaly\SettingsModule\SettingModuleRouteProvider');
    }
}
