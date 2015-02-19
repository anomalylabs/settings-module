<?php namespace Anomaly\SettingsModule\Setting;

use Illuminate\Support\Collection;

/**
 * Class SettingCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\SettingInterface
 */
class SettingCollection extends Collection
{

    /**
     * Create a new SettingCollection instance.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        foreach ($items as $key => $value) {
            $this->items[substr($key, strpos($key, '::') + 2)] = $value;
        }
    }
}
