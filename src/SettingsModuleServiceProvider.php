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
     * Boot the service provider.
     */
    public function boot()
    {
        if (INSTALLED) {
            $this->app->make('twig')->addExtension($this->app->make('\Anomaly\SettingsModule\SettingModulePlugin'));
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\SettingsModule\Setting\SettingServiceProvider');
    }
}
