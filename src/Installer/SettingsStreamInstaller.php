<?php namespace Anomaly\SettingsModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class SettingsStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Settings\Module\Installer
 */
class SettingsStreamInstaller extends StreamInstaller
{

    /**
     * Stream information.
     *
     * @var array
     */
    protected $stream = [
        'slug'   => 'settings',
        'locked' => true,
    ];

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'key'   => ['required' => true, 'unique' => true],
        'value' => [],
    ];

}