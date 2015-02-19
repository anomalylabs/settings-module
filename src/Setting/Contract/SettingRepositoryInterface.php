<?php namespace Anomaly\SettingsModule\Setting\Contract;

use Anomaly\SettingsModule\Setting\SettingCollection;

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
