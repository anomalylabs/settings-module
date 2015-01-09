<?php namespace Anomaly\SettingsModule\Setting;

use Illuminate\Foundation\Bus\DispatchesCommands;

class SettingService
{

    use DispatchesCommands;

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

        $value = $this->settings->findSetting($addonType, $addonSlug, $key)->value;

        return $value;
    }

    public function set($key, $value)
    {
        list($namespace, $key) = explode('::', $key);
        list($addonType, $addonSlug) = explode('.', $namespace);

        $this->dispatchFromArray(
            'Anomaly\Settings\Module\Setting\Command\SetSettingValueCommand',
            compact('addonType', 'addonSlug', 'key', 'value')
        );
    }
}
 