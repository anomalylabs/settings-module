<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Addon;
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
        $form  = $builder->getForm();
        $addon = $form->getEntry();

        if ($addon instanceof Addon) {
            $namespace = $addon->getNamespace() . '::';
        } else {
            $namespace = 'streams::';
        }

        /**
         * Get the fields from the configuration system.
         */
        if (!$fields = $this->config->get($namespace . 'settings.fields')) {
            $fields = $this->config->get($namespace . 'settings', []);
        }

        /**
         * Finish each field.
         */
        foreach ($fields as $slug => &$field) {

            /**
             * Force an array. This is done later
             * too in normalization but we need it NOW.
             */
            if (is_string($field)) {
                $field = [
                    'type' => $field
                ];
            }

            $field['config'] = array_get($field, 'config', []);
            $field['label']  = trans($namespace . 'setting.' . $slug . '.label');

            $placeholder = $namespace . 'setting.' . $slug . '.placeholder';

            if ($placeholder != ($translated = trans($placeholder))) {
                $field['config']['placeholder'] = $translated;
            }

            $instructions = $namespace . 'setting.' . $slug . '.instructions';

            if ($instructions != ($translated = trans($instructions))) {
                $field['instructions'] = $translated;
            }

            $field['value'] = $settings->get($namespace . $slug, array_get($field['config'], 'default_value'));
        }

        $builder->setFields($fields);
    }
}
