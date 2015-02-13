<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\Streams\Platform\Model\Settings\SettingsSettingsEntryModel;

/**
 * Class SettingModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting
 */
class SettingModel extends SettingsSettingsEntryModel
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $cacheMinutes = 30;

}
