<?php namespace Anomaly\SettingsModule\Setting\Form;

use Anomaly\Streams\Platform\Addon\Block\BlockCollection;
use Anomaly\Streams\Platform\Addon\Distribution\DistributionCollection;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\Streams\Platform\Addon\Plugin\PluginCollection;
use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
use Anomaly\Streams\Platform\Ui\Form\Form;

/**
 * Class SettingFormData
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Form
 */
class SettingFormData
{

    /**
     * The block collection.
     *
     * @var BlockCollection
     */
    protected $blocks;


    /**
     * The theme collection.
     *
     * @var ThemeCollection
     */
    protected $themes;

    /**
     * The module collection.
     *
     * @var ModuleCollection
     */
    protected $modules;

    /**
     * The plugin collection.
     *
     * @var PluginCollection
     */
    protected $plugins;

    /**
     * The extension collection.
     *
     * @var ExtensionCollection
     */
    protected $extensions;

    /**
     * The field type collection.
     *
     * @var FieldTypeCollection
     */
    protected $fieldTypes;

    /**
     * The distribution collection.
     *
     * @var DistributionCollection
     */
    protected $distributions;

    /**
     * Create a new SettingFormData instance.
     *
     * @param BlockCollection        $blocks
     * @param ThemeCollection        $themes
     * @param ModuleCollection       $modules
     * @param PluginCollection       $plugins
     * @param ExtensionCollection    $extensions
     * @param FieldTypeCollection    $fieldTypes
     * @param DistributionCollection $distributions
     */
    public function __construct(
        BlockCollection $blocks,
        ThemeCollection $themes,
        ModuleCollection $modules,
        PluginCollection $plugins,
        ExtensionCollection $extensions,
        FieldTypeCollection $fieldTypes,
        DistributionCollection $distributions
    ) {
        $this->blocks        = $blocks;
        $this->themes        = $themes;
        $this->modules       = $modules;
        $this->plugins       = $plugins;
        $this->extensions    = $extensions;
        $this->fieldTypes    = $fieldTypes;
        $this->distributions = $distributions;
    }

    /**
     * Handle the form data.
     *
     * @param Form $form
     */
    public function handle(Form $form)
    {
        $form->addData('blocks', $this->blocks->withConfig('settings'));
        $form->addData('themes', $this->themes->withConfig('settings'));
        $form->addData('modules', $this->modules->withConfig('settings'));
        $form->addData('plugins', $this->plugins->withConfig('settings'));
        $form->addData('extensions', $this->extensions->withConfig('settings'));
        $form->addData('field_types', $this->fieldTypes->withConfig('settings'));
        $form->addData('distributions', $this->distributions->withConfig('settings'));
    }
}
