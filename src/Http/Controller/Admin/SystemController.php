<?php namespace Anomaly\SettingsModule\Http\Controller\Admin;

use Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Support\Authorizer;

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
     * @param Authorizer         $authorizer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(SettingFormBuilder $form, Authorizer $authorizer)
    {
        if (!$authorizer->authorize('anomaly.module.settings::settings.write')) {
            abort(403);
        }

        return $form->render('streams');
    }
}
