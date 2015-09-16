<?php namespace Anomaly\SettingsModule\Listener;

use Anomaly\SettingsModule\Setting\SettingCollection;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\View\Event\TemplateDataIsLoading;

/**
 * Class LoadSettings
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Listener
 */
class LoadSettings
{

    /**
     * The settings repository.
     *
     * @var SettingCollection
     */
    private $settings;

    /**
     * The object decorator.
     *
     * @var Decorator
     */
    private $decorator;

    /**
     * Create a new LoadSettings instance.
     *
     * @param SettingCollection $settings
     * @param Decorator         $decorator
     */
    public function __construct(SettingCollection $settings, Decorator $decorator)
    {
        $this->settings  = $settings;
        $this->decorator = $decorator;
    }

    /**
     * Handle the event.
     *
     * @param TemplateDataIsLoading $event
     */
    public function handle(TemplateDataIsLoading $event)
    {
        $template = $event->getTemplate();

        $template->put('settings', $this->decorator->decorate($this->settings));
    }
}
