<?php namespace Anomaly\SettingsModule\Setting\Contract;

use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Interface SettingRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\SettingInterface\Contract
 */
interface SettingRepositoryInterface
{

    /**
     * Return all setting values in a namespace.
     *
     * @param $namespace
     * @return EntryCollection
     */
    public function all($namespace);

    /**
     * Get a setting value.
     *
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Set a setting value.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value);
}
