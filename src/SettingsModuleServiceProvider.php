<?php namespace Anomaly\Streams\Addon\Module\Settings;

use Illuminate\Support\ServiceProvider;
use Anomaly\Streams\Addon\Module\Settings\Setting\SettingModel;
use Anomaly\Streams\Addon\Module\Settings\Setting\SettingService;

class SettingsModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerPreferenceService();
        $this->registerHelpers();
    }

    protected function registerPreferenceService()
    {
        $this->app->singleton(
            'streams.preferences',
            function () {

                return new SettingService(new SettingModel());

            }
        );
    }

    protected function registerHelpers()
    {
        include_once __DIR__ . '../../resources/helpers.php';
    }

}
 