<?php namespace Anomaly\SettingsModule\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
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
     * @param Repository                 $config
     * @param ThemeCollection            $themes
     * @param SettingRepositoryInterface $settings
     */
    public function handle(Repository $config, ThemeCollection $themes, SettingRepositoryInterface $settings)
    {

    }
}
