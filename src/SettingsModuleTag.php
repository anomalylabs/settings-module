<?php namespace Anomaly\SettingsModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleTag;

/**
 * Class SettingsTag
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Tag\Settings
 */
class SettingsModuleTag extends ModuleTag
{

    /**
     * Get a setting value.
     *
     * @return mixed
     */
    public function get()
    {
        return setting(
            $this->getAttribute('key'),
            $this->getAttribute('default')
        );
    }
}
 