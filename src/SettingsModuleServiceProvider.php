<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Command\AddSettingsPlugin;
use Anomaly\SettingsModule\Command\ConfigureStreams;
use Illuminate\Foundation\Bus\DispatchesCommands;
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

    use DispatchesCommands;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        if (env('INSTALLED')) {
            $this->dispatch(new AddSettingsPlugin());
            $this->dispatch(new ConfigureStreams());
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
