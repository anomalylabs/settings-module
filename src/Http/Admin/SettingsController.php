<?php namespace Anomaly\Streams\Addon\Module\Settings\Http\Admin;

use Anomaly\Streams\Addon\Module\Settings\Ui\Form\SettingForm;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class SettingsController extends AdminController
{

    public function index($type)
    {
        echo $type;
        die;
    }

    public function edit($type, $slug, SettingForm $form)
    {
        $settings = config("{$type}.{$slug}::settings");

        return $form->setSections($settings)->render();
    }
}
 