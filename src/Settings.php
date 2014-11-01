<?php namespace Anomaly\Streams\Addon\Module\Settings;

/**
 * Class Settings
 *
 * This is the class responsible for returning settings
 * for the UI. It primarily holds arrays.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Settings
 */
class Settings
{

    /**
     * Available settings.
     *
     * @var array
     */
    protected $settings = [];

    /**
     * Create a new Settings instance.
     */
    function __construct()
    {
        $this->boot();
    }

    /**
     * Set up the class.
     */
    protected function boot()
    {
        //
    }

    /**
     * Set available settings.
     *
     * @param array $settings
     * return $this
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get available settings.
     *
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }
}
 