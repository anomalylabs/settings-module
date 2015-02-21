<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Illuminate\Config\Repository;

/**
 * Class SettingFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Form
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
    public function handle(SettingFormBuilder $builder, SettingRepositoryInterface $settings)
    {
        $namespace = $builder->getFormEntry() . '::';

        /**
         * Get the fields from the config system. Sections are
         * optionally defined the same way.
         */
        if (!$fields = $this->config->get($namespace . 'settings.fields')) {
            $fields = $fields = $this->config->get($namespace . 'settings', []);
        }

        if ($sections = $this->config->get($namespace . 'settings.sections')) {
            $builder->setFormOption('sections', $sections);
        }

        /**
         * Finish each field.
         */
        foreach ($fields as $slug => &$field) {

            /**
             * Force an array. This is done later
             * too in normalization but we need it now
             * because we are normalizing / guessing our
             * own parameters somewhat.
             */
            if (is_string($field)) {
                $field = [
                    'type' => $field
                ];
            }

            $type = app($field['type']);

            $modifier = $type->getModifier();

            // Make sure we have a config property.
            $field['config'] = array_get($field, 'config', []);

            // Default the label.
            $field['label'] = array_get(
                $field,
                'label',
                $namespace . 'setting.' . $slug . '.label'
            );

            // Default the placeholder.
            $field['config']['placeholder'] = array_get(
                $field['config'],
                'placeholder',
                $namespace . 'setting.' . $slug . '.placeholder'
            );

            // Default the instructions.
            $field['instructions'] = array_get(
                $field,
                'instructions',
                $namespace . 'setting.' . $slug . '.instructions'
            );

            // Get the value defaulting to the default value.
            $field['value'] = $settings->get($namespace . $slug, array_get($field['config'], 'default_value'));

            // Restore the value with the modifier.
            if ($modifier instanceof FieldTypeModifier) {
                $field['value'] = $modifier->restore($field['value']);
            }
        }

        $builder->setFields($fields);
    }
}
