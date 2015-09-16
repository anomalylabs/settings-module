<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class GetValuePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Command
 */
class GetValuePresenter implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The setting instance.
     *
     * @var SettingInterface
     */
    protected $setting;

    /**
     * Create a new GetValuePresenter instance.
     *
     * @param SettingInterface $setting
     */
    public function __construct(SettingInterface $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Handle the command.
     *
     * @return \Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter|mixed|object
     */
    public function handle()
    {
        /* @var FieldType $type */
        if ($type = $this->dispatch(new GetValueFieldType($this->setting))) {
            return $type->getPresenter();
        }

        return array_get($this->setting->getAttributes(), 'value');
    }
}
