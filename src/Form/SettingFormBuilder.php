<?php namespace Anomaly\SettingsModule\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

class SettingFormBuilder extends FormBuilder
{

    protected $actions = [
        'save',
    ];

    protected $buttons = [
        'cancel',
        'delete',
    ];

}
 