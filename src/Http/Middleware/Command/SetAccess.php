<?php namespace Anomaly\SettingsModule\Http\Middleware\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetAccess
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Http\Middleware\Command
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
            $config->set('streams::access.force_https', $https);
        }

        // Set frontend status.
        if (($status = $settings->get('streams::site_enabled')) !== null) {
            $config->set('streams::access.site_enabled', $status);
        }

        // Set the IP whitelist for disabled frontend.
        if ($whitelist = $settings->get('streams::ip_whitelist')) {
            $config->set('streams::access.ip_whitelist', $whitelist);
        }
    }
}
