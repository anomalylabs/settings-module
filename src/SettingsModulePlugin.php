<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\Command\GetSetting;
use Anomaly\SettingsModule\Setting\Command\GetSettingValue;
use Anomaly\SettingsModule\Setting\Command\GetValueFieldType;
use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class SettingsModulePlugin
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
                    return $this->dispatchSync(new GetSettingValue($key, $default));
                }
            ),
            new \Twig_SimpleFunction(
                'setting',
                function ($key) {

                    /* @var SettingInterface $setting */
                    if (!$setting = $this->dispatchSync(new GetSetting($key))) {
                        return null;
                    }

                    return (new Decorator())->decorate($this->dispatchSync(new GetValueFieldType($setting)));
                }
            ),
        ];
    }
}
