<?php namespace Anomaly\SettingsModule\Setting\Table;

use Anomaly\Streams\Platform\Addon\AddonCollection;

/**
 * Class AddonTableEntries
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SettingsModule\Setting\Table
 */
class AddonTableEntries
{

    /**
     * Handle the command.
     *
     * @param AddonTableBuilder $builder
     * @param AddonCollection   $addons
     */
    public function handle(AddonTableBuilder $builder, AddonCollection $addons)
    {
        $builder->setTableEntries(
            $addons->{$builder->getType()}->withAnyConfig(['settings', 'settings/settings'])
        );
    }
}
