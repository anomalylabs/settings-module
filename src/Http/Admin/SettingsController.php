<?php namespace Anomaly\SettingsModule\Http\Admin;

use Anomaly\Settings\Module\Ui\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class SettingsController extends AdminController
{

    public function edit($type, $slug, SettingFormBuilder $builder)
    {
        $settings = $this->execute(
            'Anomaly\Settings\Module\Command\GetFormBuilderSectionsCommand',
            compact('type', 'slug')
        );

        return $builder->setSections($settings)->render();
    }
}
 