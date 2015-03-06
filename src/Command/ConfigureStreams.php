<?php namespace Anomaly\SettingsModule\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class ConfigureStreams
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Command
 */
class ConfigureStreams implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param Repository                 $config
     */
    public function handle(SettingRepositoryInterface $settings, Repository $config)
    {
        $config->set('streams.force_https', $settings->get('force_https', $config->get('streams.force_https')));
        $config->set('streams.site_enabled', $settings->get('site_enabled', $config->get('streams.site_enabled')));
        $config->set('streams.ip_whitelist', $settings->get('ip_whitelist', $config->get('streams.ip_whitelist')));
    }
}
