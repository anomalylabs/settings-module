<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class SettingFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Ui\Form
 */
class SettingFormBuilder extends FormBuilder
{

    /**
     * Form fields.
     *
     * @var array
     */
    protected $fields = [
        'api_key' => [
            'type'         => 'text',
            'label'        => 'API Key',
            'instructions' => 'Enter your Stripe API key below.',
            'rules'        => [
                'required'
            ]
        ]
    ];

}
