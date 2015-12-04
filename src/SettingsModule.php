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

    /**
     * The module icon.
     *
     * @var string
     */
    protected $icon = 'cogs';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'system',
        'modules',
        'themes',
        'extensions',
        'field_types',
        'plugins'
    ];

}
