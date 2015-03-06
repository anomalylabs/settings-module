<?php namespace Anomaly\SettingsModule\Listener;

use Illuminate\Container\Container;
use TwigBridge\Bridge;

/**
 * Class AddSettingsPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Command
 */
class AddSettingsPlugin
{

    /**
     * The twig instance.
     *
     * @var Bridge
     */
    protected $twig;

    /**
     * The services container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new AddSettingsPlugin instance.
     *
     * @param Bridge    $twig
     * @param Container $container
     */
    public function __construct(Bridge $twig, Container $container)
    {
        $this->twig      = $twig;
        $this->container = $container;
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        $this->twig->addExtension($this->container->make('\Anomaly\SettingsModule\SettingsModulePlugin'));
    }
}
