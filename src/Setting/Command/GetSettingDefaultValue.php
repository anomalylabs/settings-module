<?php namespace Anomaly\SettingsModule\Setting\Command;

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetSettingDefaultValue
 *
 * @link          http://fritzandandre.com
 * @author        Brennon Loveless <brennon@fritzandandre.com>
 * @package       Anomaly\SettingsModule\Setting\Command
 */
class GetSettingDefaultValue implements SelfHandling
{
    /**
     * The qualified key of the setting.
     * Namespace . :: . key
     *
     * @var
     */
    protected $settingKey;

    /**
     * GetSettingDefaultValue constructor.
     *
     * @param $settingKey
     */
    public function __construct($settingKey)
    {
        $this->settingKey = $settingKey;
    }

    /**
     * Look for a default value from the config definition file. If it has one then return it, otherwise return null.
     *
     * @param Repository $config
     * @param Container  $container
     * @return mixed
     */
    public function handle(Repository $config, Container $container)
    {
        $parts     = explode('::', $this->settingKey);
        $namespace = $parts[0];
        $key       = $parts[1];

        if (!$fields = $config->get($namespace . '::settings/settings')) {
            $fields = $config->get($namespace . '::settings');
        }

        $defaultValue = array_get($fields, $key . '.config.default_value', null);

        /**
         * If it is a closure, run it through the IoC container
         */
        if ($fields && ($defaultValue instanceof \Closure)) {

            return $container->call($defaultValue);
        }

        return $defaultValue;
    }
}