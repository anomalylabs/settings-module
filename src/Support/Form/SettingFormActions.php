<?php namespace Anomaly\SettingsModule\Support\Form;

/**
 * Class SettingFormActions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Support\Form
 */
class SettingFormActions
{

    /**
     * Handle form actions.
     *
     * @param SettingFormBuilder $builder
     */
    public function handle(SettingFormBuilder $builder)
    {
        $builder->setActions(
            [
                'save'
            ]
        );
    }
}
