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
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/settings'        => 'Anomaly\SettingsModule\Http\Controller\Admin\SettingsController@index',
        'admin/settings/system' => 'Anomaly\SettingsModule\Http\Controller\Admin\SettingsController@system',
        'admin/settings/admin'  => 'Anomaly\SettingsModule\Http\Controller\Admin\SettingsController@admin',
        'admin/settings/theme'  => 'Anomaly\SettingsModule\Http\Controller\Admin\SettingsController@theme'
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\SettingsModule\Setting\SettingModel'                        => 'Anomaly\SettingsModule\Setting\SettingModel',
        'Anomaly\Streams\Platform\Model\Settings\SettingsSettingsEntryModel' => 'Anomaly\SettingsModule\Setting\SettingModel'
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
        'Anomaly\Streams\Platform\Addon\Event\AddonsRegistered' => [
            'Anomaly\SettingsModule\Listener\ConfigureStreams' => 10
        ]
    ];

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\SettingsModule\SettingsModulePlugin'
    ];

}
