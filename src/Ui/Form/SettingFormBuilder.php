<?php namespace Anomaly\SettingsModule\Ui\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

class SettingFormBuilder extends FormBuilder
{

    protected $handler = 'Anomaly\Settings\Module\Ui\Form\SettingFormHandler@handle';

    protected $actions = [
        'save',
    ];

    protected $buttons = [
        'cancel',
        'delete',
    ];

    function __construct(Form $form)
    {
        parent::__construct($form);
    }
}
 