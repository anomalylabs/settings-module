<?php namespace Anomaly\SettingsModule\Listener\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Theme\Theme;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;

/**
 * Class SetThemes
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Listener\Command
 */
class SetThemes implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param ThemeCollection            $themes
     * @param Repository                 $config
     * @param Request                    $request
     * @param SettingRepositoryInterface $settings
     */
    function handle(ThemeCollection $themes, Repository $config, Request $request, SettingRepositoryInterface $settings)
    {
        /**
         * Set the active admin theme.
         *
         * @var Theme $admin
         */
        if ($admin = $themes->get($settings->get('streams::admin_theme'))) {

            $admin->setActive(true);
            $config->set('streams::themes.admin.active', $admin->getNamespace());

        } elseif ($admin = $themes->admin()->first()) {

            $admin->setActive(true);
            $config->set('streams::themes.admin.active', $admin->getNamespace());

        }

        /**
         * Set the active public theme.
         *
         * @var Theme $standard
         */
        if ($standard = $themes->get($settings->get('streams::public_theme'))) {

            $standard->setActive(true);
            $config->set('streams::themes.standard.active', $standard->getNamespace());

        } elseif ($standard = $themes->standard()->first()) {

            $standard->setActive(true);
            $config->set('streams::themes.standard.active', $standard->getNamespace());

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
