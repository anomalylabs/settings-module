<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleSettingsMakeKeyNotUnique
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleSettingsMakeKeyNotUnique extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $field      = $this->fields()->findBySlugAndNamespace('key', 'settings');
        $stream     = $this->streams()->findBySlugAndNamespace('settings', 'settings');
        $assignment = $this->assignments()->findByStreamAndField($stream, $field);

        $this->assignments()->save($assignment->setAttribute('unique', false));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $field      = $this->fields()->findBySlugAndNamespace('key', 'settings');
        $stream     = $this->streams()->findBySlugAndNamespace('settings', 'settings');
        $assignment = $this->assignments()->findByStreamAndField($stream, $field);

        $this->assignments()->save($assignment->setAttribute('unique', true));
    }
}
