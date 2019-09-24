<?php namespace Anomaly\SettingsModule\Setting\Command;

use Anomaly\Streams\Platform\Support\Resolver;

/**
 * Class GetDefaultValue
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetDefaultValue
{

    /**
     * The qualified key of the setting.
     *
     * {namespace}::{key}
     *
     * @var string
     */
    protected $key;

    /**
     * GetDefaultValue constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Look for a default value from the config definition file. If it has one then return it, otherwise return null.
     *
     * @param  Resolver $resolver
     * @return mixed
     */
    public function handle(Resolver $resolver)
    {
        list($namespace, $key) = explode('::', $this->key);

        if (!$fields = config($namespace . '::settings/settings')) {
            $fields = config($namespace . '::settings');
        }

        return $resolver->resolve(array_get($fields, $key . '.config.default_value', null));
    }
}
