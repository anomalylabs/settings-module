<?php namespace Anomaly\SettingsModule\Setting\Contract;

use Anomaly\SettingsModule\Setting\SettingCollection;

/**
 * Interface SettingRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Contract
 */
interface SettingRepository
{

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

    /**
     * Get all settings for a namespace.
     *
     * @param $getNamespace
     * @return SettingCollection
     */
    public function getAll($namespace);
}
