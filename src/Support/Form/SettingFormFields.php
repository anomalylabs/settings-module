<?php namespace Anomaly\SettingsModule\Support\Form;

use Anomaly\SettingsModule\Setting\Contract\SettingRepository;
use Illuminate\Config\Repository;

/**
 * Class SettingFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Support\Form
 */
class SettingFormFields
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new SettingFormFields instance.
     *
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Return the form fields.
     *
     * @param SettingFormBuilder $builder
     */
    public function handle(SettingFormBuilder $builder, SettingRepository $settings)
    {
        $form  = $builder->getForm();
        $addon = $form->getEntry();

        /**
         * Get the fields from the configuration system.
         */
        if (!$fields = $this->config->get($addon->getNamespace('settings.fields'))) {
            $fields = $this->config->get($addon->getNamespace('settings'), []);
        }

        /**
         * Finish each field.
         */
        foreach ($fields as $slug => &$field) {
            $field['label'] = trans($addon->getNamespace('setting.' . $slug . '.label'));

            $placeholder = $addon->getNamespace('setting.' . $slug . '.placeholder');

            if ($placeholder != ($translated = trans($placeholder))) {
                $field['placeholder'] = $translated;
            }

            $instructions = $addon->getNamespace('setting.' . $slug . '.instructions');

            if ($instructions != ($translated = trans($instructions))) {
                $field['instructions'] = $translated;
            }

            $field['value'] = $settings->get($addon->getNamespace($slug));
        }

        return $fields;
    }
}
