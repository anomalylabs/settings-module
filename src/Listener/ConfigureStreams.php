<?php namespace Anomaly\SettingsModule\Listener;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Config\Repository;

/**
 * Class ConfigureStreams
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Command
 */
class ConfigureStreams
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new ConfigureStreams instance.
     *
     * @param SettingRepositoryInterface $settings
     * @param Repository                 $config
     */
    public function __construct(SettingRepositoryInterface $settings, Repository $config)
    {
        $this->config   = $config;
        $this->settings = $settings;
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        $this->config->set(
            'streams.force_https',
            $this->settings->get('force_https', $this->config->get('streams.force_https'))
        );

        $this->config->set(
            'streams.site_enabled',
            $this->settings->get('site_enabled', $this->config->get('streams.site_enabled'))
        );

        $this->config->set(
            'streams.ip_whitelist',
            $this->settings->get('ip_whitelist', $this->config->get('streams.ip_whitelist'))
        );
    }
}
