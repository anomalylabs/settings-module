<?php namespace Anomaly\SettingsModule\Support\Form;

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
    public function handle(SettingFormBuilder $builder)
    {
        if (!$fields = $this->config->get(app($builder->getEntry())->getNamespace('settings.fields'))) {
            $fields = $this->config->get(app($builder->getEntry())->getNamespace('settings'), []);
        }

        return $fields;
    }
}
