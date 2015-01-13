<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\Settings\Module\Setting\SettingModel;

class SetSettingValueHandler
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
 