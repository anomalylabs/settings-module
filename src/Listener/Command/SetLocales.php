<?php namespace Anomaly\SettingsModule\Listener\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetLocales
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Listener\Command
 */
class SetLocales implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Repository                 $config
     * @param SettingRepositoryInterface $settings
     */
    function handle(Repository $config, SettingRepositoryInterface $settings)
    {
        // Set default locale.
        if ($locale = $settings->get('streams::default_locale')) {
            $config->set('app.fallback_locale', $locale);
        }

        // Set enabled locales.
        if ($locales = $settings->get('streams::enabled_locales')) {
            $config->set('streams::locales.enabled', $locales);
        }
    }
}
