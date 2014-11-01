<?php namespace Anomaly\Streams\Addon\Module\Settings\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class SettingsStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Settings\Installer
 */
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
        'addon_type' => [],
        'addon_slug' => [],
        'key'        => [],
        'value'      => [],
    ];

}