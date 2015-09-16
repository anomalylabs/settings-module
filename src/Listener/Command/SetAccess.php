<?php namespace Anomaly\SettingsModule\Listener\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetAccess
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Listener\Command
 */
class SetAccess implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Repository                 $config
     * @param SettingRepositoryInterface $settings
     */
    function handle(Repository $config, SettingRepositoryInterface $settings)
    {
        // Set HTTPS behavior.
        if ($https = $settings->get('streams::force_https')) {
            $config->set('streams::access.force_https', $https->getValue());
        }

        // Set frontend status.
        if ($status = $settings->get('streams::site_enabled')) {
            $config->set('streams::access.site_enabled', $status->getValue());
        }

        // Set the IP whitelist for disabled frontend.
        if ($whitelist = $settings->get('streams::ip_whitelist')) {
            $config->set('streams::access.ip_whitelist', $whitelist->getValue());
        }
    }
}
