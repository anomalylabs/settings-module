<?php namespace Anomaly\Streams\Addon\Module\Settings\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

class SettingsFieldInstaller extends FieldInstaller
{

    /**
     * Fields to install.
     *
     * @var array
     */
    protected $fields = [
        'key'        => [
            'type' => 'text',
        ],
        'value'      => [
            'type' => 'textarea',
        ],
        'addon_type' => [
            'type' => 'text',
        ],
        'addon_slug' => [
            'type' => 'text',
        ],
    ];

}