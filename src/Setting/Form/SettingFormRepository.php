<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Ui\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;

/**
 * Class SettingFormRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Form
 */
class SettingFormRepository implements FormRepositoryInterface
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new SettingFormRepositoryInterface instance.
     *
     * @param Repository                 $config
     * @param Container                  $container
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(Repository $config, Container $container, SettingRepositoryInterface $settings)
    {
        $this->config    = $config;
        $this->settings  = $settings;
        $this->container = $container;
    }

    /**
     * Find an entry or return a new one.
     *
     * @param $id
     * @return string
     */
    public function findOrNew($id)
    {
        return $id;
    }

    /**
     * Save the form.
     *
     * @param FormBuilder $builder
     * @return bool|mixed
     */
    public function save(FormBuilder $builder)
    {
        $form = $builder->getForm();

        $namespace = $form->getEntry() . '::';

        /* @var FieldType $field */
        foreach ($form->getFields() as $field) {

            $key   = $namespace . $field->getField();
            $value = $form->getValue($field->getInputName());

            $this->settings->set($key, $value);
        }
    }
}
