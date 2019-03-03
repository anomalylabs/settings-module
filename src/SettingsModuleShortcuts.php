<?php namespace Anomaly\SettingsModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\Streams\Platform\Ui\ControlPanel\ControlPanelBuilder;

/**
 * Class SettingsModuleShortcuts
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SettingsModuleShortcuts
{

    /**
     * Handle the shortcuts.
     *
     * @param ControlPanelBuilder $builder
     * @param ModuleCollection $modules
     */
    public function handle(ControlPanelBuilder $builder, ModuleCollection $modules)
    {
        if (!$module = $modules->active()) {
            return;
        }

        if (!$module->hasAnyConfig(['settings', 'settings/settings'])) {
            return;
        }

        $builder->addShortcut(
            'settings',
            [
                'icon' => 'cogs',
                'href' => 'admin/settings/modules/' . $module->getNamespace(),
            ]
        );
    }
}
