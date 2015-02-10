<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;

/**
 * Class SettingFormHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Form
 */
class SettingFormHandler
{

    public function handle(Form $form)
    {
        $form->getFields();
    }
}
