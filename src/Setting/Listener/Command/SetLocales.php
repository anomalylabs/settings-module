<?php namespace Anomaly\SettingsModule\Setting\Listener\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Application;

/**
 * Class SetLocales
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Listener\Command
 */
class SetLocales implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Repository                 $config
     * @param SettingRepositoryInterface $settings
     */
    function handle(Application $app, Repository $config, SettingRepositoryInterface $settings)
    {
        // Set default locale.
        if (!defined('LOCALE') && $locale = $settings->get('streams::default_locale')) {
            $app->setLocale($locale->getValue());
            $config->set('app.locale', $locale->getValue());
        }

        // Set enabled locales.
        if ($locales = $settings->get('streams::enabled_locales')) {
            $config->set('streams::locales.enabled', $locales->getValue());
        }
    }
}
