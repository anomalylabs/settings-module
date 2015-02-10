<?php namespace Anomaly\SettingsModule\Support\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
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

    /**
     * The form fields handler.
     *
     * @var string
     */
    protected $fields = 'Anomaly\SettingsModule\Support\Form\SettingFormFields@handle';

    /**
     * Create a new SettingFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $form->setOption(
            'handler',
            'Anomaly\SettingsModule\Support\Form\SettingFormHandler@handle'
        );

        parent::__construct($form);
    }
}
 