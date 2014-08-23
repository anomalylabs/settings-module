<?php namespace Addon\Module\Settings;

use Streams\Core\Addon\ModuleAbstract;

class SettingsModule extends ModuleAbstract
{
    /**
     * Module sections.
     *
     * @var array
     */
    public $sections = [
        [
            'path'  => 'admin/settings',
            'title' => 'Settings',
        ],
    ];

    /**
     * The icon to represent the module.
     *
     * @var string
     */
    public $icon = '<i class="fa fa-cog"></i>';
}
