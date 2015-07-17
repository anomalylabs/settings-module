<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class SettingPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting
 */
class SettingPlugin extends Plugin
{

    /**
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new SettingPlugin instance.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(SettingRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('settings_get', [$this->settings, 'get'])
        ];
    }
}
