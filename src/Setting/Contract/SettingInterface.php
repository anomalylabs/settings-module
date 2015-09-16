<?php namespace Anomaly\SettingsModule\Setting\Contract;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface SettingInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\SettingInterface\Contract
 */
interface SettingInterface extends EntryInterface
{

    /**
     * Get the key.
     *
     * @return string
     */
    public function getKey();

    /**
     * Get the value.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Return the related value
     * field type presenter.
     *
     * @return FieldTypePresenter
     */
    public function value();
}
