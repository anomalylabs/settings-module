<?php namespace Anomaly\SettingsModule\Setting\Event;

/**
 * Class SettingsWereSaved
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SettingsModule\Setting\Event
 */
class SettingsWereSaved
{

    /**
     * The setting's namespace.
     *
     * @var string
     */
    protected $namespace;

    /**
     * Create a new SettingsWereSaved instance.
     *
     * @param string $namespace
     */
    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * Get the namespace.
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }
}
