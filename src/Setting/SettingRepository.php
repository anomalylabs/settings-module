<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Illuminate\Config\Repository;

/**
 * Class SettingRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\SettingInterface
 */
class SettingRepository implements SettingRepositoryInterface
{

    /**
     * The setting model.
     *
     * @var SettingModel
     */
    protected $model;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new SettingRepositoryInterface instance.
     *
     * @param SettingModel $model
     * @param Repository   $config
     */
    public function __construct(SettingModel $model, Repository $config)
    {
        $this->model  = $model;
        $this->config = $config;
    }

    /**
     * Find a setting by it's key
     * or return a new instance.
     *
     * @param $key
     * @return SettingInterface
     */
    public function findOrNew($key)
    {
        $setting = $this->model->where('key', $key)->first();

        if (!$setting) {
            return $this->model->newInstance();
        }

        return $setting;
    }

    /**
     * Get a setting value.
     *
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $setting = $this->model->where('key', $key)->first();

        if (!$setting) {
            return $this->config->get($key, $default);
        }

        if (!$field = config(str_replace('::', '::settings/settings.', $key))) {
            $field = config(str_replace('::', '::settings.', $key));
        }

        $type = app(array_get($field, 'type'));

        if (!$type instanceof FieldType) {
            return null;
        }

        $modifier = $type->getModifier();

        if ($modifier instanceof FieldTypeModifier) {
            return $modifier->restore($setting->value);
        }

        return $setting->value;
    }

    /**
     * Set a setting value.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $setting = $this->model->where('key', $key)->first();

        if (!$setting) {

            $setting = $this->model->newInstance();

            $setting->key = $key;
        }

        $field = str_replace('::', '::settings.', $key);

        $type = app(config($field . '.type', config($field)));

        $modifier = $type->getModifier();

        if ($modifier instanceof FieldTypeModifier) {
            $value = $modifier->modify($value);
        }

        $setting->value = $value;

        $setting->save();

        return $this;
    }

    /**
     * Get all settings for a namespace.
     *
     * @param $getNamespace
     * @return SettingCollection
     */
    public function getAll($namespace)
    {
        $settings = $this->model->where('key', 'LIKE', $namespace . '::%')->get();

        return new SettingCollection($settings->lists('value', 'key'));
    }
}
