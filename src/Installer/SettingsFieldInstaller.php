<?php namespace Anomaly\Streams\Addon\Module\Settings\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

/**
 * Class SettingsFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Settings\Installer
 */
class SettingsFieldInstaller extends FieldInstaller
{

    /**
     * Fields to install.
     *
     * @var array
     */
    protected $fields = [
        'addon_type' => [
            'type' => 'text',
        ],
        'addon_slug' => [
            'type' => 'text',
        ],
        'key'        => [
            'type' => 'text',
        ],
        'value'      => [
            'type' => 'textarea',
        ],
    ];

}