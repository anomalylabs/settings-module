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
            $this->items[str_replace('::', '.', $item->getKey())] = $item;
        }
    }

    /**
     * Get an item out of the collection, identified by $key
     * $key might be "double colon separated", so convert that to a dot-notation the collection can work with
     *
     * @param string $key
     * @param mixed $default
     */
    public function get($key, $default = null)
    {
        // convert the db keyname to a collection compatible keyname
        return parent::get(str_replace('::', '.', $key), $default);
    }
}
