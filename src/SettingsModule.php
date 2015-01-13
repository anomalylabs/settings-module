<?php namespace Anomaly\SettingsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class SettingsModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Settings\Module
 */
class SettingsModule extends Module
{

    protected $navigation = 'streams::navigation.system';

    protected $sections = [
        'settings'
    ];

}
