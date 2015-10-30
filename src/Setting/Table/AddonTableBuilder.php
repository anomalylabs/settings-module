<?php namespace Anomaly\SettingsModule\Setting\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class AddonTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Setting\Table
 */
class AddonTableBuilder extends TableBuilder
{

    /**
     * The addon type.
     *
     * @var string
     */
    protected $type;

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        [
            'heading' => 'module::field.name.name',
            'value'   => 'entry.name'
        ],
        [
            'heading' => 'module::field.description.name',
            'value'   => 'entry.description'
        ]
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'settings' => [
            'href' => 'admin/settings/{request.route.parameters.type}/{entry.namespace}'
        ]
    ];

    /**
     * Get the type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type.
     *
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
