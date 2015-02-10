<?php namespace Anomaly\SettingsModule\Setting;

/**
 * Class SettingRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting
 */
class SettingRepository
{

    /**
     * The setting model.
     *
     * @var SettingModel
     */
    protected $model;

    /**
     * Create a new SettingRepository instance.
     *
     * @param SettingModel $model
     */
    public function __construct(SettingModel $model)
    {
        $this->model = $model;
    }
}
