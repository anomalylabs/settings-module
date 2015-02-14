<?php namespace Anomaly\SettingsModule\Setting;

use Anomaly\Streams\Platform\Model\Settings\SettingsSettingsEntryModel;

/**
 * Class SettingModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting
 */
class SettingModel extends SettingsSettingsEntryModel
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $cacheMinutes = 30;

    /**
     * Set a field value.
     *
     * @param $fieldSlug
     * @param $value
     */
    public function setFieldValue($fieldSlug, $value)
    {
        $assignment = $this->getAssignment($fieldSlug);

        $type = $assignment->getFieldType($this);

        $accessor = $type->getAccessor();
        $modifier = $type->getModifier();

        $this->setRawAttributes($accessor->set($this->getAttributes(), $modifier->modify($value)));
    }

    /**
     * Get a field value.
     *
     * @param      $fieldSlug
     * @param bool $decorate
     * @return mixed
     */
    public function getFieldValue($fieldSlug, $decorate = false)
    {
        $assignment = $this->getAssignment($fieldSlug);

        $type = $assignment->getFieldType($this);

        $accessor = $type->getAccessor();
        $modifier = $type->getModifier();

        $value = $modifier->restore($accessor->get($this->getAttributes(), $fieldSlug));

        if (!$decorate) {
            return $value;
        }

        $type->setValue($value);

        return $type->getPresenter();
    }
}
