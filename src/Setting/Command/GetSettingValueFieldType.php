<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetSettingValueFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Plugin\Command
 */
class GetSettingValueFieldType implements SelfHandling
{

    /**
     * The setting key.
     *
     * @var string
     */
    protected $key;

    /**
     * Create a new GetSettingValueFieldType instance.
     *
     * @param      $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @return \Anomaly\Streams\Platform\Addon\FieldType\FieldType|null
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        if (!$setting = $settings->get($this->key)) {
            return null;
        }

        return $setting->getFieldType('value');
    }
}
