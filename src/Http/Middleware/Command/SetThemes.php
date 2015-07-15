<?php namespace Anomaly\SettingsModule\Http\Middleware\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Theme\Theme;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetThemes
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Http\Middleware\Command
 */
class SetThemes implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Repository                 $config
     * @param ThemeCollection            $themes
     * @param SettingRepositoryInterface $settings
     */
    function handle(Repository $config, ThemeCollection $themes, SettingRepositoryInterface $settings)
    {
        /**
         * Set the active admin theme.
         *
         * @var Theme $theme
         */
        if ($theme = $themes->get($settings->get('streams::admin_theme'))) {
            $theme->setActive(true);
        }

        /**
         * Set the active admin theme.
         *
         * @var Theme $theme
         */
        if ($theme = $themes->get($settings->get('streams::public_theme'))) {
            $theme->setActive(true);
        }
    }
}
