<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetSetting
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Plugin\Command
 */
class GetSetting implements SelfHandling
{

    /**
     * The setting key.
     *
     * @var string
     */
    protected $key;

    /**
     * Create a new GetSetting instance.
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
     * @return \Anomaly\SettingsModule\Setting\Contract\SettingInterface|null
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        return $settings->get($this->key);
    }
}
