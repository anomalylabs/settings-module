<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class ConfigureStreams
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SettingsModule\Setting\Command
 */
class ConfigureStreams implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param Application                $application
     * @param Repository                 $config
     */
    public function handle(SettingRepositoryInterface $settings, Application $application, Repository $config)
    {
        $config->set('app.debug', $settings->value('streams::debug', false));
        $config->set('app.timezone', $settings->value('streams::timezone', 'UTC'));

        $config->set('streams::locales.default', $settings->value('streams::default_locale', 'en'));
        $config->set('streams::locales.enabled', $settings->value('streams::enabled_locales', ['en']));

        $config->set('streams::themes.admin', $settings->value('streams::admin_theme', env('ADMIN_THEME')));
        $config->set('streams::themes.standard', $settings->value('streams::standard_theme', env('STANDARD_THEME')));

        $maintenance = $settings->value('streams::maintenance', false);

        if ($maintenance && !$application->isDownForMaintenance()) {
            touch(storage_path('framework/down'));
        }

        if (!$maintenance && $application->isDownForMaintenance()) {
            unlink(storage_path('framework/down'));
        }

        $config->set('streams::maintenance.auth', $settings->value('streams::basic_auth', false));
        $config->set('streams::maintenance.ip_whitelist', $settings->value('streams::ip_whitelist', []));

        $config->set('streams::system.per_page', $settings->value('streams::per_page', 15));

        $config->set('mail.from.name', $settings->value('streams::sender', $config->get('streams::system.name')));
        $config->set('mail.from.address', $settings->value('streams::email', env('ADMIN_EMAIL')));

        $config->set('mail.driver', $settings->value('streams::mail_driver', $config->get('mail.driver')));
        $config->set('mail.host', $settings->value('streams::mail_host', $config->get('mail.host')));
        $config->set('mail.port', $settings->value('streams::mail_port', $config->get('mail.port')));
        $config->set('mail.username', $settings->value('streams::mail_username', $config->get('mail.username')));
        $config->set('mail.password', $settings->value('streams::mail_password', $config->get('mail.password')));
        $config->set('mail.pretend', $settings->value('streams::mail_debug', $config->get('mail.pretend')));
    }
}
