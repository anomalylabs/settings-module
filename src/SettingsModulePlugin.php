<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\Command\GetSetting;
use Anomaly\SettingsModule\Setting\Command\GetSettingValue;
use Anomaly\SettingsModule\Setting\Command\GetValueFieldType;
use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;
use Twig\TwigFunction;

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
            new TwigFunction(
                'setting_value',
                function ($key, $default = null) {
                    return dispatch_sync(new GetSettingValue($key, $default));
                }
            ),
            new TwigFunction(
                'setting',
                function ($key) {

                    /* @var SettingInterface $setting */
                    if (!$setting = dispatch_sync(new GetSetting($key))) {
                        return null;
                    }

                    return (new Decorator())->decorate(dispatch_sync(new GetValueFieldType($setting)));
                }
            ),
        ];
    }
}
