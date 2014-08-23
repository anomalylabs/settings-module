<?php namespace Streams\Addon\Module\Settings\Installer;

use Streams\Core\Addon\Installer\ModuleInstallerAbstractAbstract;

class SettingsModuleInstallerAbstract extends ModuleInstallerAbstractAbstract
{
    /**
     * The streams definitions.
     *
     * @var array
     */
    protected $streams = [
        'settings',
    ];
}
