<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetSetting
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
     * The default value.
     *
     * @var mixed
     */
    protected $default;

    /**
     * Create a new GetSetting instance.
     *
     * @param      $key
     * @param null $default
     */
    public function __construct($key, $default = null)
    {
        $this->key     = $key;
        $this->default = $default;
    }

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @return mixed
     */
    public function handle(SettingRepositoryInterface $settings)
    {
        return $settings->get($this->key, $this->default);
    }
}
