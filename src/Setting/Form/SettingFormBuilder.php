<?php namespace Anomaly\SettingsModule\Setting\Form;

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
     * The form fields handler.
     *
     * @var string
     */
    protected $fields = 'Anomaly\SettingsModule\Setting\Form\SettingFormFields@handle';

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
     * Fire at the beginning of the build process.
     */
    public function onReady()
    {
        $this->setOption('permission', $this->entry . '::settings');
        $this->setOption('permission', $this->entry . '::settings');
        $this->setOption('breadcrumb', 'anomaly.module.settings::breadcrumb.settings', '#');
    }
}
