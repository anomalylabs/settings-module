<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\Contract\SettingRepository;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class SettingModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule
 */
class SettingModulePlugin extends Plugin
{

    /**
     * The settings repository.
     *
     * @var SettingRepository
     */
    protected $settings;

    /**
     * Create a new SettingModulePlugin instance.
     *
     * @param SettingRepository $settings
     */
    public function __construct(SettingRepository $settings)
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
            new \Twig_SimpleFunction('setting_get', [$this->settings, 'get'])
        ];
    }
}
