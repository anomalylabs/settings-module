<?php namespace Anomaly\Streams\Module\Settings\Installer;

use Anomaly\Streams\Platform\Stream\Model\StreamModel;
use Anomaly\Streams\Platform\Support\Installer;
use Anomaly\Streams\Platform\Addon\AddonAbstract;
use Anomaly\Streams\Platform\Field\Installer\FieldInstaller;
use Anomaly\Streams\Platform\Assignment\Installer\AssignmentInstaller;

class SettingsInstaller extends Installer
{
    /**
     * Settings to install.
     *
     * @var array
     */
    protected $settings = [];

    /**
     * Create a new SettingsInstaller instance.
     *
     * @param AddonAbstract $addon
     */
    public function __construct(AddonAbstract $addon)
    {
        $this->addon = $addon;

        $this->fieldInstaller      = new FieldInstaller($addon);
        $this->assignmentInstaller = new AssignmentInstaller($addon);

        $stream = (new StreamModel())->findBySlugAndNamespace('settings', 'settings');

        $this->assignmentInstaller->setStream($stream);
    }

    /**
     * Install settings.
     *
     * @return bool|void
     */
    public function install()
    {
        $this->installSettingFields();
        $this->installSettingAssignments();
    }

    /**
     * Install settings fields.
     */
    protected function installSettingFields()
    {
        foreach ($this->settings as $slug => $field) {

            $field['slug'] = $this->addon->getType() . '_' . $this->addon->getSlug() . '_' . $slug;

            $field['namespace'] = 'settings';

            unset(
            $field['is_required'],
            $field['is_unique'],
            $field['rules']
            );

            $this->fieldInstaller->setField($field)->install();
        }
    }

    /**
     * Install settings assignments.
     */
    protected function installSettingAssignments()
    {
        foreach ($this->settings as $field => $assignment) {

            $assignment['field'] = $this->addon->getType() . '_' . $this->addon->getSlug() . '_' . $field;

            unset(
            $assignment['type']
            );

            $this->assignmentInstaller->setAssignment($assignment)->install();
        }
    }
}