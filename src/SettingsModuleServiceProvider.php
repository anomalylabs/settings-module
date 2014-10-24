<?php namespace Anomaly\Streams\Addon\Module\Settings;

use Anomaly\Streams\Addon\Module\Settings\Setting\SettingModel;
use Anomaly\Streams\Addon\Module\Settings\Setting\SettingService;
use Illuminate\Support\ServiceProvider;

class SettingsModuleServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton(
            'streams.settings',
            function () {

                return new SettingService(new SettingModel());

            }
        );
    }
}
 