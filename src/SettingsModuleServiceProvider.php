<?php namespace Anomaly\SettingsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class SettingsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule
 */
class SettingsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\SettingsModule\SettingsModulePlugin'
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\SettingsModule\Setting\SettingModel' => 'Anomaly\SettingsModule\Setting\SettingModel'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface' => 'Anomaly\SettingsModule\Setting\SettingRepository'
    ];

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\Streams\Platform\Application\Event\ApplicationHasLoaded' => [
            'Anomaly\SettingsModule\Listener\ConfigureStreams'
        ]
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/settings' => 'Anomaly\SettingsModule\Http\Controller\Admin\SettingsController@edit'
    ];

}
