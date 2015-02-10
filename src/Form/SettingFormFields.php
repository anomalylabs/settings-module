<?php namespace Anomaly\SettingsModule\Form;

/**
 * Class SettingFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Form
 */
class SettingFormFields
{

    /**
     * Return the form fields.
     *
     * @return array
     */
    public function handle()
    {
        return [
            'api_key' => [
                'label' => 'API KEY',
                'type'  => 'text',
                'value' => 'Test'
            ]
        ];
    }
}
