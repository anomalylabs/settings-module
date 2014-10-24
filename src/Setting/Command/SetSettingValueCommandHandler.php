<?php namespace Anomaly\Streams\Addon\Module\Settings\Setting\Command;

use Anomaly\Streams\Addon\Module\Settings\Setting\SettingModel;

class SetSettingValueCommandHandler
{
    protected $setting;

    function __construct(SettingModel $setting)
    {
        $this->setting = $setting;
    }

    public function handle(SetSettingValueCommand $command)
    {
        $data = [
            'key'        => $command->getKey(),
            'value'      => $command->getValue(),
            'addon_type' => $command->getAddonType(),
            'addon_slug' => $command->getAddonSlug(),
        ];

        return $this->setting->updateOrCreate($data);
    }
}
 