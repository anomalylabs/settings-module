<?php namespace Anomaly\SettingsModule\Http\Controller\Admin;

use Anomaly\SettingsModule\Support\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

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
     * Return a form for editing streams settings.
     *
     * @param SettingFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(SettingFormBuilder $form)
    {
        return $form->render('streams');
    }
}
