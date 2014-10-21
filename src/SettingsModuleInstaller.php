<?php namespace Anomaly\Streams\Module\Settings;

use Anomaly\Streams\Platform\Addon\Installer\ModuleInstaller;

class SettingsModuleInstaller extends ModuleInstaller
{
    /**
     * Installers to install.
     *
     * @var array
     */
    protected $install = [
        'Streams\Addon\Module\Settings\Installer\SettingsStreamInstaller',
    ];
}
