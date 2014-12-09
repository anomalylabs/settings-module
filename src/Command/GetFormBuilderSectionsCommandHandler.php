<?php namespace Anomaly\Streams\Addon\Module\Settings\Command;

class GetFormBuilderSectionsCommandHandler
{

    public function handle(GetFormBuilderSectionsCommand $command)
    {
        return config("{$command->getType()}.{$command->getSlug()}::settings");
    }
}
 