<?php namespace Anomaly\Streams\Addon\Module\Settings;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

class SettingsModuleInstaller extends ModuleInstaller
{
    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\Streams\Addon\Module\Settings\Installer\SettingsFieldInstaller',
        'Anomaly\Streams\Addon\Module\Settings\Installer\SettingsStreamInstaller',
    ];
}
