<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Config\Repository;

/**
 * Class SettingFormFields
 *
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 *
 * @link          http://pyrocms.com/
 */
class SettingFormFields
{

    /**
     * The namespace
     *
     * @var string
     */
    protected $namespace = '';

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
     * @param SettingFormBuilder         $builder
     * @param SettingRepositoryInterface $settings
     */
    public function handle(
        SettingFormBuilder $builder,
        SettingRepositoryInterface $settings
    ) {
        $this->namespace = $builder->getFormEntry();

        /*
         * Get the fields from the config system. Sections are
         * optionally defined the same way.
         */
        if (!$fields = $this->config->get($this->namespace . '::settings/settings')) {
            $fields = $fields = $this->config->get($this->namespace . '::settings', []);
        }

        if ($sections = $this->config->get($this->namespace . '::settings/sections')) {
            $builder->setSections($sections);
        }

        /*
         * Finish each field.
         */
        foreach ($fields as $slug => &$field) {

            $this->slug = $slug;

            /*
             * Force an array. This is done later
             * too in normalization but we need it now
             * because we are normalizing / guessing our
             * own parameters somewhat.
             */
            if (is_string($field)) {
                $field = [
                    'type'   => $field,
                    'config' => [],
                ];
            }

            $field = array_merge([
                'value'        => null,
                'config'       => [],
                'label'        => $this->makeTrans('label'),
                'warning'      => $this->makeTrans('warning'),
                'placeholder'  => $this->makeTrans('placeholder'),
                'instructions' => $this->makeTrans('instructions'),
            ], $field);

            // Get the value defaulting to the default value.
            if ($field['value'] === null) {
                $field['value'] = $settings->value(
                    "{$this->namespace}::{$slug}",
                    array_get($field['config'], 'default_value')
                );
            }

            // Disable the field if it has a set env value.
            if (isset($field['env']) && isset($field['bind']) && env($field['env']) !== null) {
                $field['disabled'] = true;
                $field['warning']  = 'module::message.env_locked';
                $field['value']    = $this->config->get($field['bind']);
            }
        }

        $builder->setFields($fields);
    }

    /**
     * Makes a translation
     *
     * @param  string $key The key.
     * @return string      Translation.
     */
    protected function makeTrans(string $key)
    {
        return trans()->has($key)
            ? "{$this->namespace}::setting.{$this->slug}.{$key}"
            : '';
    }
}
