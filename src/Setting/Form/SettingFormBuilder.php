<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class SettingFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Form
 */
class SettingFormBuilder extends FormBuilder
{

    /**
     * The form actions handler.
     *
     * @var string
     */
    protected $actions = [
        'save'
    ];

    /**
     * The form buttons handler.
     *
     * @var string
     */
    protected $buttons = [
        'cancel'
    ];

    /**
     * The form fields handler.
     *
     * @var string
     */
    protected $fields = 'Anomaly\SettingsModule\Setting\Form\SettingFormFields@handle';

    /**
     * Create a new SettingFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $form->setOption('data', 'Anomaly\SettingsModule\Setting\Form\SettingFormData@handle');
        $form->setOption('repository', 'Anomaly\SettingsModule\Setting\Form\SettingFormRepository');

        parent::__construct($form);
    }
}
