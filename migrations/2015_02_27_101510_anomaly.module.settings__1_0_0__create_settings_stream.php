<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleSettingsCreateSettingsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleSettings_1_0_0_CreateSettingsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'settings'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'key' => [
            'required' => true,
            'unique'   => true
        ],
        'value'
    ];

}
