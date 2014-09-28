<?php namespace Streams\Addon\Module\Settings;

use Streams\Platform\Model\Settings\SettingsSettingsEntryModel;

class Settings
{
    /**
     * Loaded settings models.
     *
     * @var array
     */
    protected $models = [];

    /**
     * The settings model object.
     *
     * @var
     */
    protected $settings;

    /**
     * Create a new Settings instance.
     */
    public function __construct()
    {
        $this->settings = (new SettingsSettingsEntryModel())->firstOrCreate([]);
    }

    /**
     * Get a settings value.
     *
     * @param      $key
     * @param null $default
     * @return null
     */
    public function get($key, $default = null)
    {
        list($namespace, $slug) = explode('::', $key);

        list($type, $addon) = explode('.', $namespace);

        $setting = "{$type}_{$addon}_{$slug}";

        if (isset($this->settings->{$setting})) {
            if (strpos($setting, '.') !== false) {
                list($setting, $presenter) = explode('.', $setting);

                $value = $this->settings->{$setting}->{$presenter};
            } else {
                $value = $this->settings->{$setting};
            }

            if ($value === null) {
                $value = $default;
            }
        } else {
            $value = $default;
        }

        return $value;
    }

    /**
     * Set the value for a setting.
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        list($namespace, $slug) = explode('::', $key);

        list($type, $addon) = explode('.', $namespace);

        $setting = "{$type}_{$addon}_{$slug}";

        $this->settings->{$setting} = $value;

        return $this->settings->save();
    }

    /**
     * Return all the settings.
     *
     * @param $type
     * @param $addon
     * @return mixed
     */
    public function getModel($type, $addon)
    {
        $key = "{$type}.{$addon}";

        $namespace = 'Streams\Platform\Model\Settings\\';

        $model = $namespace . 'Settings' . studly_case("{$type}_{$addon}") . 'EntryModel';

        if (!isset($this->models[$key])) {
            echo 'New model';
            $this->models[$key] = new $model;
        }

        return $this->models[$key];
    }
} 