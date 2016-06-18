<?php namespace Anomaly\SettingsModule\Http\Controller\Admin;

use Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SystemController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SettingsModule\Http\Controller\Admin
 */
class SystemController extends AdminController
{

    /**
     * Return the form for editing settings.
     *
     * @param SettingFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(SettingFormBuilder $form)
    {
        return $form->render('streams');
    }
}
