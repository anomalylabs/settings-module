<?php namespace Anomaly\SettingsModule\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

/**
 * Class SettingsFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Settings\Module\Installer
 */
class SettingsFieldInstaller extends FieldInstaller
{

    /**
     * Fields to install.
     *
     * @var array
     */
    protected $fields = [
        'key'   => [
            'type' => 'anomaly.field_type.text'
        ],
        'value' => [
            'type' => 'anomaly.field_type.textarea'
        ],
        'type'  => [
            'type'   => 'anomaly.field_type.addon',
            'config' => [
                'type' => 'field_type'
            ]
        ]
    ];

}
