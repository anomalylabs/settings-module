<?php namespace Anomaly\SettingsModule\Listener\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetEmail
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Listener\Command
 */
class SetEmail implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Repository                 $config
     * @param SettingRepositoryInterface $settings
     */
    function handle(Repository $config, SettingRepositoryInterface $settings)
    {
        // Set email driver.
        if ($driver = $settings->get('streams::mail_driver')) {
            $config->set('mail.driver', $driver);
        }

        // Set SMTP host.
        if ($host = $settings->get('streams::mail_host')) {
            $config->set('mail.host', $host);
        }

        // Set SMTP port.
        if ($port = $settings->get('streams::mail_port')) {
            $config->set('mail.port', $port);
        }

        // Set SMTP username.
        if ($username = $settings->get('streams::mail_username')) {
            $config->set('mail.username', $username);
        }

        // Set SMTP password.
        if ($password = $settings->get('streams::mail_password')) {
            $config->set('mail.password', $password);
        }

        // Set SMTP debug mode.
        if (($password = $settings->get('streams::mail_debug')) !== null) {
            $config->set('mail.pretend', $password);
        }
    }
}
