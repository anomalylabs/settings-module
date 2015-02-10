<?php namespace Anomaly\SettingsModule\Support\Form;

use Anomaly\SettingsModule\Setting\Contract\SettingRepository;
use Anomaly\Streams\Platform\Ui\Form\Contract\FormRepository;
use Anomaly\Streams\Platform\Ui\Form\Form;
use Illuminate\Container\Container;

/**
 * Class SettingFormRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Support\Form
 */
class SettingFormRepository implements FormRepository
{

    /**
     * The settings repository.
     *
     * @var SettingRepository
     */
    protected $settings;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new SettingFormRepository instance.
     *
     * @param Container         $container
     * @param SettingRepository $settings
     */
    public function __construct(Container $container, SettingRepository $settings)
    {
        $this->settings  = $settings;
        $this->container = $container;
    }

    /**
     * Find an entry or return a new one.
     *
     * @param $id
     * @return mixed
     */
    public function findOrNew($id)
    {
        return $this->container->make($id);
    }

    /**
     * Save the form.
     *
     * @param Form $form
     * @return bool|mixed
     */
    public function save(Form $form)
    {
        $addon   = $form->getEntry();
        $request = $form->getRequest();

        foreach ($form->getFields() as $field) {
            $this->settings->set(
                $addon->getNamespace($field->getField()),
                $request->get($field->getInputName())
            );
        }
    }
}
