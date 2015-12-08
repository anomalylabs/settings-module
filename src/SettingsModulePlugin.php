<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\Command\GetSetting;
use Anomaly\SettingsModule\Setting\Command\GetSettingValue;
use Anomaly\SettingsModule\Setting\Command\GetSettingValueFieldType;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class SettingsModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule
 */
class SettingsModulePlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'setting_value',
                function ($key, $default = null) {
                    return $this->dispatch(new GetSettingValue($key, $default));
                }
            ),
            new \Twig_SimpleFunction(
                'setting',
                function ($key) {
                    return (new Decorator())->decorate($this->dispatch(new GetSettingValueFieldType($key)));
                }
            )
        ];
    }
}
