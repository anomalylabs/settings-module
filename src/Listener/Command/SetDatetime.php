<?php namespace Anomaly\SettingsModule\Listener\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetDatetime
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Listener\Command
 */
class SetDatetime implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Repository                 $config
     * @param SettingRepositoryInterface $settings
     */
    function handle(Repository $config, SettingRepositoryInterface $settings)
    {
        // Set the timezone.
        if ($timezone = $settings->get('streams::default_timezone')) {
            $config->set('app.timezone', $timezone->getValue());
            $config->set('streams::datetime.default_timezone', $timezone->getValue());
        }

        // Set the date format.
        if ($format = $settings->get('streams::date_format')) {
            $config->set('streams::datetime.date_format', $format->getValue());
        }

        // Set the time format.
        if ($format = $settings->get('streams::time_format')) {
            $config->set('streams::datetime.time_format', $format->getValue());
        }
    }
}
