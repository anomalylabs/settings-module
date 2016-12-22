<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleSettingsAddLocaleToSettings
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleSettingsAddLocaleToSettings extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'locale' => 'anomaly.field_type.text',
    ];

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'settings',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'locale' => [
            'unique' => true,
        ],
    ];
}
