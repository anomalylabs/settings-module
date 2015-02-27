<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleSettingsCreateSettingsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleSettingsCreateSettingsStream extends Migration
{

    /**
     * Stream information.
     *
     * @var array
     */
    protected $stream = [
        'slug'   => 'settings',
        'locked' => true
    ];

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'key'   => [
            'required' => true,
            'unique'   => true
        ],
        'value' => []
    ];

}
