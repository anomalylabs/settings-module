<?php namespace Anomaly\SettingsModule\Command;

class GetFormBuilderSectionsCommandHandler
{

    public function handle(GetFormBuilderSectionsCommand $command)
    {
        return config("{$command->getType()}.{$command->getSlug()}::settings", []);
    }
}
 