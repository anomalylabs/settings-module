<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\SettingModel;
use Anomaly\SettingsModule\Setting\SettingService;
use Illuminate\Support\ServiceProvider;

/**
 * Class SettingsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Settings\Module
 */
class SettingsModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerServiceProviders();
        $this->registerSettingsService();
        $this->registerHelpers();
    }

    /**
     * Register internal service providers.
     */
    protected function registerServiceProviders()
    {
        $this->app->register('Anomaly\SettingsModule\Provider\RouteServiceProvider');
    }

    /**
     * Register the settings service.
     */
    protected function registerSettingsService()
    {
        $this->app->singleton(
            'streams.settings',
            function () {

                return new SettingService(new SettingModel());
            }
        );
    }

    /**
     * Register the helpers.
     */
    protected function registerHelpers()
    {
        include_once __DIR__ . '/../resources/helpers.php';
    }
}
 