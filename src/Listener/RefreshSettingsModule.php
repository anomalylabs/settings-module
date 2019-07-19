<?php namespace Anomaly\SettingsModule\Listener;

use Anomaly\Streams\Platform\Application\Event\SystemIsRefreshing;

/**
 * Class RefreshSettingsModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RefreshSettingsModule
{

    /**
     * Handle the event.
     *
     * @param SystemIsRefreshing $event
     */
    public function handle(SystemIsRefreshing $event)
    {
        $command = $event->getCommand();

        $command->call('settings:dump');
    }
}
