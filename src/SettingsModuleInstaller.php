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
        'Anomaly\Settings\Module\Installer\SettingsFieldInstaller',
        'Anomaly\Settings\Module\Installer\SettingsStreamInstaller',
    ];
}
