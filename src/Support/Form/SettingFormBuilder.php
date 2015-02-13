<?php namespace Anomaly\SettingsModule\Support\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class SettingFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Support\Form
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
    protected $fields = 'Anomaly\SettingsModule\Support\Form\SettingFormFields@handle';

    /**
     * Create a new SettingFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $form->setOption(
            'repository',
            'Anomaly\SettingsModule\Support\Form\SettingFormRepository'
        );

        parent::__construct($form);
    }
}
 