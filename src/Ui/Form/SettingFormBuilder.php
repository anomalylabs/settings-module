<?php namespace Anomaly\Streams\Addon\Module\Settings\Ui\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

class SettingFormBuilder extends FormBuilder
{

    protected $handler = 'Anomaly\Streams\Addon\Module\Settings\Ui\Form\SettingFormHandler@handle';

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
 