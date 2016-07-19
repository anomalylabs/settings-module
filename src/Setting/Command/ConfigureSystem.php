<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class ConfigureSystem
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SettingsModule\Setting\Command
 */
class ConfigureSystem implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param AddonCollection            $addons
     * @param Repository                 $config
     */
    public function handle(
        SettingRepositoryInterface $settings,
        AddonCollection $addons,
        Repository $config
    ) {
        /* @var Addon $addon */
        foreach ($addons->withConfig('settings') as $addon) {
            foreach ($config->get($addon->getNamespace('settings')) as $key => $setting) {

                if (isset($setting['env']) && env($setting['env']) !== null) {
                    continue;
                }

                if (!isset($setting['bind'])) {
                    continue;
                }

                if (!$settings->has($key = $addon->getNamespace($key))) {
                    continue;
                }

                $config->set($setting['bind'], $settings->presenter($key)->__value());
            }
        }

        foreach ($addons->withConfig('settings/settings') as $addon) {
            foreach ($config->get($addon->getNamespace('settings/settings')) as $key => $setting) {

                if (isset($setting['env']) && env($setting['env']) !== null) {
                    continue;
                }

                if (!isset($setting['bind'])) {
                    continue;
                }

                if (!$settings->has($key = $addon->getNamespace($key))) {
                    continue;
                }

                $config->set($setting['bind'], $settings->presenter($key)->__value());
            }
        }

        foreach ($config->get('streams::settings/settings', []) as $key => $setting) {

            if (isset($setting['env']) && env($setting['env']) !== null) {
                continue;
            }

            if (!isset($setting['bind'])) {
                continue;
            }

            if (!$settings->has($key = 'streams::' . $key)) {
                continue;
            }

            $config->set($setting['bind'], $settings->presenter($key)->__value());
        }
    }
}
