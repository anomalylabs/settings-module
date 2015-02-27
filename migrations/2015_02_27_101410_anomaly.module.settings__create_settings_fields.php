<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleSettingsCreateSettingsFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleSettingsCreateSettingsFields extends Migration
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
        ]
    ];

}
