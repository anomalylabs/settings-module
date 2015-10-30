<?php namespace Anomaly\SettingsModule\Http\Controller\Admin;

use Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SystemController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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
