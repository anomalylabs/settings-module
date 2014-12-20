<?php namespace Anomaly\Streams\Addon\Module\Settings\Http\Admin;

use Anomaly\Streams\Addon\Module\Settings\Ui\Table\ModuleTableBuilder;
use Anomaly\Streams\Addon\Module\Settings\Ui\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class SettingsController extends AdminController
{

    public function edit($type, $slug, SettingFormBuilder $builder)
    {
        $settings = $this->execute(
            'Anomaly\Streams\Addon\Module\Settings\Command\GetFormBuilderSectionsCommand',
            compact('type', 'slug')
        );

        return $builder->setSections($settings)->render();
    }
}
 
