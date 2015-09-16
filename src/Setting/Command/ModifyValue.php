<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ModifyValue
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Command
 */
class ModifyValue implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The setting value.
     *
     * @var mixed
     */
    protected $value;

    /**
     * The setting instance.
     *
     * @var SettingInterface
     */
    protected $setting;

    /**
     * Create a new ModifyValue instance.
     *
     * @param SettingInterface $setting
     * @param                  $value
     */
    function __construct(SettingInterface $setting, $value)
    {
        $this->value   = $value;
        $this->setting = $setting;
    }

    /**
     * Handle the command.
     *
     * @return mixed
     */
    public function handle()
    {
        /* @var FieldType $type */
        if ($type = $this->dispatch(new GetValueFieldType($this->setting))) {
            return $type->getModifier()->modify($this->value);
        }

        return $this->value;
    }
}
