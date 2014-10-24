<?php namespace Anomaly\Streams\Addon\Module\Settings\Setting;

use Anomaly\Streams\Platform\Model\Settings\SettingsSettingsEntryModel;

class SettingModel extends SettingsSettingsEntryModel
{
    public function newCollection(array $items = [])
    {
        return new SettingCollection($items);
    }
}
 