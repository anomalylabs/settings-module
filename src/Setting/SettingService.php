<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\Settings\Module\Exception\SettingDoesNotExistException;
use Laracasts\Commander\CommanderTrait;

class SettingService
{

    use CommanderTrait;

    protected $setting;

    protected $settings;

    function __construct(SettingModel $setting)
    {
        $this->setting  = $setting;
        $this->settings = $setting->all();
    }

    public function get($key, $default = null)
    {
        list($namespace, $key) = explode('::', $key);
        list($addonType, $addonSlug) = explode('.', $namespace);

        try {

            $value = $this->settings->findSetting($addonType, $addonSlug, $key)->value;
        } catch (SettingDoesNotExistException $e) {

            $value = $default;
        }

        return $value;
    }

    public function set($key, $value)
    {
        list($namespace, $key) = explode('::', $key);
        list($addonType, $addonSlug) = explode('.', $namespace);

        $this->execute(
            'Anomaly\Settings\Module\Setting\Command\SetSettingValueCommand',
            compact('addonType', 'addonSlug', 'key', 'value')
        );
    }
}
 