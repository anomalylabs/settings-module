<?php namespace Anomaly\SettingsModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

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
