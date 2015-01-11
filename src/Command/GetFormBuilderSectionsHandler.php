<?php namespace Anomaly\SettingsModule\Command;

class GetFormBuilderSectionsHandler
{

    public function handle(GetFormBuilderSectionsCommand $command)
    {
        return config("{$command->getType()}.{$command->getSlug()}::settings", []);
    }
}
 