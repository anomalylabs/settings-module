<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\Form;
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
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

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
     * @param Form $form
     * @return bool|mixed
     */
    public function save(Form $form)
    {
        $namespace = $form->getEntry() . '::';

        foreach ($form->getFields() as $field) {
            $this->settings->set(
                $namespace . $field->getField(),
                $form->getValue($field->getInputName())
            );
        }
    }
}
