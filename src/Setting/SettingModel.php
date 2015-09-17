<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\SettingsModule\Setting\Command\GetValuePresenter;
use Anomaly\SettingsModule\Setting\Command\ModifyValue;
use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
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
    protected $cacheMinutes = 99999;

    /**
     * Get the key.
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the key.
     *
     * @param $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value.
     *
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the value.
     *
     * @param $value
     * @return $this
     */
    protected function setValueAttribute($value)
    {
        $this->attributes['value'] = $this->dispatch(new ModifyValue($this, $value));

        return $this;
    }

    /**
     * Return the related value
     * field type presenter.
     *
     * @return FieldTypePresenter
     */
    public function value()
    {
        return $this->dispatch(new GetValuePresenter($this));
    }
}
