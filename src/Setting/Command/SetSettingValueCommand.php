<?php namespace Anomaly\Streams\Addon\Module\Settings\Setting\Command;

class SetSettingValueCommand
{
    protected $addonType;

    protected $addonSlug;

    protected $key;

    protected $value;

    function __construct($addonType, $addonSlug, $key, $value)
    {
        $this->key       = $key;
        $this->value     = $value;
        $this->addonSlug = $addonSlug;
        $this->addonType = $addonType;
    }

    /**
     * @return mixed
     */
    public function getAddonSlug()
    {
        return $this->addonSlug;
    }

    /**
     * @return mixed
     */
    public function getAddonType()
    {
        return $this->addonType;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
 