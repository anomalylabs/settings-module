<?php namespace Anomaly\Streams\Addon\Module\Settings\Setting;

use Anomaly\Streams\Platform\Traits\CommandableTrait;
use Anomaly\Streams\Addon\Module\Settings\Exception\SettingDoesNotExistException;
use Anomaly\Streams\Addon\Module\Settings\Setting\Command\SetSettingValueCommand;

class SettingService
{
    use CommandableTrait;

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

            $value = $this->settings->find($addonType, $addonSlug, $key)->value;

        } catch (SettingDoesNotExistException $e) {

            $value = $default;

        }

        return $value;
    }

    public function set($key, $value)
    {
        list($namespace, $key) = explode('::', $key);
        list($addonType, $addonSlug) = explode('.', $namespace);

        $command = new SetSettingValueCommand($addonType, $addonSlug, $key, $value);

        $this->execute($command);
    }
}
 