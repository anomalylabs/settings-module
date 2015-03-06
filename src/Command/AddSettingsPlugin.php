<?php namespace Anomaly\SettingsModule\Command;

use Illuminate\Container\Container;
use Illuminate\Contracts\Bus\SelfHandling;
use TwigBridge\Bridge;

/**
 * Class AddSettingsPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Command
 */
class AddSettingsPlugin implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param Bridge    $twig
     * @param Container $container
     */
    public function handle(Bridge $twig, Container $container)
    {
        $twig->addExtension($container->make('\Anomaly\SettingsModule\SettingsModulePlugin'));
    }
}
