<?php namespace Anomaly\SettingsModule\Setting\Plugin;

use Anomaly\SettingsModule\Setting\Plugin\Command\GetSetting;
use Anomaly\SettingsModule\Setting\Plugin\Command\GetSettingValue;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class SettingPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Plugin
 */
class SettingPlugin extends Plugin
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
                'setting',
                function ($key) {
                    return $this->dispatch(new GetSetting($key));
                }
            ),
            new \Twig_SimpleFunction(
                'setting_value',
                function ($key, $default) {
                    return $this->dispatch(new GetSettingValue($key, $default));
                }
            )
        ];
    }
}
