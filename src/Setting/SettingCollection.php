<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class SettingCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting
 */
class SettingCollection extends EntryCollection
{

    /**
     * Create a new SettingCollection instance.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        /* @var SettingInterface $item */
        foreach ($items as $item) {
            $this->items[$item->getKey()] = $item;
        }
    }
}
