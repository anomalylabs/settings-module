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
        'Anomaly\SettingsModule\Setting\SettingPlugin'
    ];

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\Streams\Platform\Addon\Event\AddonsRegistered'     => [
            'Anomaly\SettingsModule\Listener\ConfigureStreams',
        ],
        'Anomaly\Streams\Platform\View\Event\TemplateDataIsLoading' => [
            'Anomaly\SettingsModule\Listener\LoadSettings'
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

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface' => 'Anomaly\SettingsModule\Setting\SettingRepository'
    ];

}
