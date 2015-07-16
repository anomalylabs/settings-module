<?php namespace Anomaly\SettingsModule\Http\Middleware\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Theme\Theme;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;

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
     * @param ThemeCollection            $themes
     * @param Request                    $request
     * @param SettingRepositoryInterface $settings
     */
    function handle(ThemeCollection $themes, Request $request, SettingRepositoryInterface $settings)
    {
        /**
         * Set the active admin theme.
         *
         * @var Theme $admin
         */
        if ($admin = $themes->get($settings->get('streams::admin_theme'))) {
            $admin->setActive(true);
        } elseif ($admin = $themes->admin()->first()) {
            $admin->setActive(true);
        }

        /**
         * Set the active admin theme.
         *
         * @var Theme $standard
         */
        if ($standard = $themes->get($settings->get('streams::public_theme'))) {
            $standard->setActive(true);
        } elseif ($standard = $themes->standard()->first()) {
            $standard->setActive(true);
        }

        /**
         * Set the current theme based on
         * where we are at in the application.
         */
        if ($admin && in_array($request->segment(1), ['admin', 'installer'])) {
            $admin->setCurrent(true);
        } elseif ($standard) {
            $standard->setCurrent(true);
        }
    }
}
