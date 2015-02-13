<?php namespace Anomaly\SettingsModule\Support\Form;

/**
 * Class SettingFormButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Support\Form
 */
class SettingFormButtons
{

    /**
     * Handle form buttons.
     *
     * @param SettingFormBuilder $builder
     */
    public function handle(SettingFormBuilder $builder)
    {
        $builder->setButtons(
            [
                'cancel'
            ]
        );
    }
}
