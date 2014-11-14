<?php namespace Anomaly\Streams\Addon\Module\Settings\Ui\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;

class SettingForm extends Form
{

    protected function boot()
    {
        $this->setUpActions();
        $this->setUpRedirects();
    }

    protected function setUpRedirects()
    {
        $this->setRedirects(
            [
                'save',
            ]
        );
    }

    protected function setUpActions()
    {
        $this->setActions(
            [
                'cancel',
            ]
        );
    }
}
 