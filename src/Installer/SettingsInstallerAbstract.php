<?php namespace Streams\Addon\Module\Settings\Installer;

use Streams\Core\Addon\AddonAbstract;
use Streams\Core\Assignment\Installer\AssignmentInstaller;
use Streams\Core\Field\Installer\FieldInstaller;
use Streams\Core\Support\Installer;

abstract class SettingsInstallerAbstract extends Installer
{
    /**
     * The installation steps.
     *
     * @var array
     */
    protected $steps = [
        'install_settings',
    ];

    /**
     * Supported field values.
     *
     * @var array
     */
    private $fieldColumns = [
        'namespace',
        'slug',
        'name',
        'type',
        'settings',
        'rules',
        'is_locked',
    ];

    /**
     * Supported assignment values.
     *
     * @var array
     */
    private $assignmentColumns = [
        'instructions',
        'is_required',
        'is_unique',
        'is_translatable',
        'is_revisionable',
    ];

    /**
     * The settings definitions.
     *
     * @var array
     */
    protected $settings = [];

    /**
     * The settings model object.
     *
     * @var null
     */
    protected $model = null;

    /**
     * Create a new AddonInstallerAbstract instance.
     *
     * @param AddonAbstract $addon
     */
    public function __construct(AddonAbstract $addon)
    {
        $this->addon = $addon;

        $this->fieldInstaller      = $this->newFieldInstaller();
        $this->assignmentInstaller = $this->newAssignmentInstaller();
    }

    /**
     * Install the settings.
     *
     * @return bool
     */
    protected function installSettings()
    {
        foreach ($this->settings as $slug => $setting) {

            if (!isset($setting['slug'])) {
                $setting['slug'] = $slug;
            }

            $setting['namespace'] = 'settings';

            $assignment = clone($setting);

            print_r($setting);

            $this->fieldInstaller->setField($setting)->install();
            $this->assignmentInstaller->setAssignment($assignment)->install();
        }

        return true;
    }

    /**
     * Return a new FieldInstallerInstance.
     *
     * @return FieldInstaller
     */
    protected function newFieldInstaller()
    {
        return new FieldInstaller($this->addon);
    }

    /**
     * Return a new AssignmentInstallerInstance.
     *
     * @return AssignmentInstaller
     */
    protected function newAssignmentInstaller()
    {
        return new AssignmentInstaller($this->addon, $this->model);
    }
}
