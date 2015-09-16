<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\EntryRepository;
use Illuminate\Config\Repository;

/**
 * Class SettingRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\SettingInterface
 */
class SettingRepository extends EntryRepository implements SettingRepositoryInterface
{

    /**
     * The setting model.
     *
     * @var SettingModel
     */
    protected $model;

    /**
     * The settings collection.
     *
     * @var SettingCollection
     */
    protected $settings;

    /**
     * Create a new SettingRepositoryInterface instance.
     *
     * @param SettingModel        $model
     * @param Repository          $config
     * @param FieldTypeCollection $fieldTypes
     */
    public function __construct(SettingModel $model)
    {
        $this->model = $model;

        $this->settings = $this->model->all();
    }

    /**
     * Get a setting.
     *
     * @param $key
     * @return null|SettingInterface
     */
    public function get($key)
    {
        return $this->settings->get($key);
    }

    /**
     * Get a setting value presenter instance.
     *
     * @param $key
     * @return null|FieldTypePresenter
     */
    public function value($key)
    {
        if ($setting = $this->get($key)) {
            return $setting->value();
        }

        return null;
    }

    /**
     * Find a setting by it's key
     * or return a new instance.
     *
     * @param $key
     * @return SettingInterface
     */
    public function findByKeyOrNew($key)
    {
        if (!$setting = $this->model->where('key', $key)->first()) {
            $setting = $this->newInstance();
        }

        return $setting;
    }
}
