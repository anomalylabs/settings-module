<?php namespace Anomaly\SettingsModule\Http\Controller\Admin;

use Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Addon\Theme\Theme;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Routing\Redirector;

/**
 * Class SettingsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Http\Controller\Admin
 */
class SettingsController extends AdminController
{

    /**
     * Redirect to system settings.
     *
     * @param Redirector $redirector
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Redirector $redirector)
    {
        return $redirector->to('admin/settings/system');
    }

    /**
     * Return the system settings form.
     *
     * @param SettingFormBuilder $settings
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function system(SettingFormBuilder $settings)
    {
        return $settings->setOption('breadcrumb', null)->render('streams');
    }

    /**
     * Return the admin settings form.
     *
     * @param SettingFormBuilder $settings
     * @param Container          $container
     * @param Repository         $config
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function admin(SettingFormBuilder $settings, Container $container, Repository $config)
    {
        /* @var Theme $theme */
        $theme = $container->make($config->get('streams::themes.active.admin'));

        return $settings->setOption('breadcrumb', null)->render($theme->getNamespace());
    }

    /**
     * Return the theme settings form.
     *
     * @param SettingFormBuilder $settings
     * @param Container          $container
     * @param Repository         $config
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function theme(SettingFormBuilder $settings, Container $container, Repository $config)
    {
        /* @var Theme $theme */
        $theme = $container->make($config->get('streams::themes.active.standard'));

        return $settings->setOption('breadcrumb', null)->render($theme->getNamespace());
    }
}
