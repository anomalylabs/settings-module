<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
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
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The field type collection.
     *
     * @var FieldTypeCollection
     */
    protected $fieldTypes;

    /**
     * Create a new SettingRepositoryInterface instance.
     *
     * @param SettingModel        $model
     * @param Repository          $config
     * @param FieldTypeCollection $fieldTypes
     */
    public function __construct(SettingModel $model, Repository $config, FieldTypeCollection $fieldTypes)
    {
        $this->model      = $model;
        $this->config     = $config;
        $this->fieldTypes = $fieldTypes;
    }

    /**
     * Get the setting value.
     *
     * @param      $key
     * @param null $default
     * @return string
     */
    public function get($key, $default = null)
    {
        return (string)$this->field($key, $default);
    }

    /**
     * Get a decorated setting value.
     *
     * @param      $key
     * @param null $default
     * @return FieldTypePresenter
     */
    public function field($key, $default = null)
    {
        /**
         * First get the setting value from
         * the database or return the default.
         *
         * @var SettingInterface $setting
         */
        $setting = $this->model->where('key', $key)->first();

        if (!$setting) {
            return $default;
        } else {
            $value = $setting->getValue();
        }

        /**
         * Next try and find the field definition
         * from the settings.php configuration file.
         */
        if (!$field = config(str_replace('::', '::settings/settings.', $key))) {
            $field = config(str_replace('::', '::settings.', $key));
        }

        if (is_string($field)) {
            $field = [
                'type' => $field
            ];
        }

        /**
         * Try and get the field type that
         * the setting uses. If no exists then
         * just return the value as is.
         */
        $type = $this->fieldTypes->get(array_get($field, 'type'));

        if (!$type instanceof FieldType) {
            return $value;
        }

        $type->setEntry($setting);

        /**
         * If the type CAN be determined then
         * get the modifier and restore the value
         * before returning it.
         */
        $modifier = $type->getModifier();

        $type->setValue($modifier->restore($value));

        return $type->getPresenter();
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
        /**
         * First get the entry from the database
         * if one exists. We'll want to set the value
         * on that rather than a duplicate entry.
         *
         * If no entry is found simply spin up a new
         * instance and use that.
         *
         * @var SettingInterface $setting
         */
        $setting = $this->model->where('key', $key)->first();

        if (!$setting && $setting = $this->model->newInstance()) {
            $setting->setKey($key);
        }

        /**
         * Next try and find the field definition
         * from the settings.php configuration file.
         */
        if (!$field = config(str_replace('::', '::settings/settings.', $key))) {
            $field = config(str_replace('::', '::settings.', $key));
        }

        if (is_string($field)) {
            $field = [
                'type' => $field
            ];
        }

        /**
         * Try and get the field type that
         * the setting uses. If no exists then
         * just save the value as it is. If a
         * field type is found then modify the
         * value for storage in the database.
         */
        $type = $this->fieldTypes->get(array_get($field, 'type'));

        if ($type instanceof FieldType) {

            $modifier = $type->getModifier();

            if ($modifier instanceof FieldTypeModifier) {
                $value = $modifier->modify($value);
            }
        }

        $setting->setValue($value);

        $this->save($setting);

        return $this;
    }
}
