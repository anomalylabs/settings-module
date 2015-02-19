<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\Streams\Platform\Model\Settings\SettingsSettingsEntryModel;

/**
 * Class SettingModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\SettingInterface
 */
class SettingModel extends SettingsSettingsEntryModel implements SettingInterface
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $cacheMinutes = 30;

}
