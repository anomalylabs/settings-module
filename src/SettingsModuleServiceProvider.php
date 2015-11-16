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
        'Anomaly\SettingsModule\Setting\Plugin\SettingPlugin'
    ];

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        'Anomaly\Streams\Platform\Event\Ready'                                   => [
            'Anomaly\SettingsModule\Setting\Listener\ConfigureStreams'
        ],
        'Anomaly\Streams\Platform\Addon\Module\Event\ModuleWasUninstalled'       => [
            'Anomaly\SettingsModule\Setting\Listener\DeleteModuleSettings'
        ],
        'Anomaly\Streams\Platform\Addon\Extension\Event\ExtensionWasUninstalled' => [
            'Anomaly\SettingsModule\Setting\Listener\DeleteExtensionSettings'
        ]
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/settings'                => 'Anomaly\SettingsModule\Http\Controller\Admin\SystemController@edit',
        'admin/settings/{type}'         => 'Anomaly\SettingsModule\Http\Controller\Admin\AddonsController@index',
        'admin/settings/{type}/{addon}' => 'Anomaly\SettingsModule\Http\Controller\Admin\AddonsController@edit'
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
