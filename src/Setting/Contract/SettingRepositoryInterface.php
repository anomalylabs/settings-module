<?php namespace Anomaly\SettingsModule\Setting\Contract;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface SettingRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\SettingInterface\Contract
 */
interface SettingRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Get the setting value.
     *
     * @param      $key
     * @param null $default
     * @return string
     */
    public function get($key, $default = null);

    /**
     * Get a decorated setting value.
     *
     * @param      $key
     * @param null $default
     * @return FieldTypePresenter
     */
    public function field($key, $default = null);

    /**
     * Set a setting value.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value);
}
