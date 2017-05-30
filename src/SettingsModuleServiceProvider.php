<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\Command\ConfigureSystem;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\SettingsModule\Setting\Event\SettingsWereSaved;
use Anomaly\SettingsModule\Setting\Listener\DeleteExtensionSettings;
use Anomaly\SettingsModule\Setting\Listener\DeleteModuleSettings;
use Anomaly\SettingsModule\Setting\Listener\UpdateMaintenanceMode;
use Anomaly\SettingsModule\Setting\SettingModel;
use Anomaly\SettingsModule\Setting\SettingRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Addon\Extension\Event\ExtensionWasUninstalled;
use Anomaly\Streams\Platform\Addon\Module\Event\ModuleWasUninstalled;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Model\Settings\SettingsSettingsEntryModel;

/**
 * Class SettingsModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SettingsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        SettingsModulePlugin::class,
    ];

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        SettingsWereSaved::class       => [
            UpdateMaintenanceMode::class,
        ],
        ModuleWasUninstalled::class    => [
            DeleteModuleSettings::class,
        ],
        ExtensionWasUninstalled::class => [
            DeleteExtensionSettings::class,
        ],
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/settings'                => 'Anomaly\SettingsModule\Http\Controller\Admin\SystemController@edit',
        'admin/settings/{type}'         => 'Anomaly\SettingsModule\Http\Controller\Admin\AddonsController@index',
        'admin/settings/{type}/{addon}' => 'Anomaly\SettingsModule\Http\Controller\Admin\AddonsController@edit',
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        SettingsSettingsEntryModel::class => SettingModel::class,
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        SettingRepositoryInterface::class => SettingRepository::class,
    ];

    /**
     * Configure Streams.
     *
     * @param Application $application
     */
    public function boot(Application $application)
    {
        if (!$application->isInstalled()) {
            return;
        }

        $this->dispatch(new ConfigureSystem());
    }

}
