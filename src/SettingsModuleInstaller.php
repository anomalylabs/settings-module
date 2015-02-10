<?php namespace Anomaly\SettingsModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class SettingsModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule
 */
class SettingsModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\SettingsModule\Installer\SettingsFieldInstaller',
        'Anomaly\SettingsModule\Installer\SettingsStreamInstaller',
    ];

}
