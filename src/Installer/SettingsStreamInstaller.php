<?php namespace Anomaly\Streams\Addon\Module\Settings\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

class SettingsStreamInstaller extends StreamInstaller
{

    /**
     * Stream information.
     *
     * @var array
     */
    protected $stream = [
        'is_hidden' => true,
    ];

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'key'        => [],
        'value'      => [],
        'addon_type' => [],
        'addon_slug' => [],
    ];

}