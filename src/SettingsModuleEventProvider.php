<?php namespace Anomaly\SettingsModule;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

/**
 * Class SettingsModuleEventProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule
 */
class SettingsModuleEventProvider extends EventServiceProvider
{

    /**
     * Event listeners.
     *
     * @var array
     */
    protected $listen = [
        'Anomaly\Streams\Platform\Application\Event\ApplicationHasBooted' => [
            'Anomaly\PreferencesModule\Listener\AddPreferencesPlugin',
            'Anomaly\SettingsModule\Listener\ConfigureStreams'
        ]
    ];

}
