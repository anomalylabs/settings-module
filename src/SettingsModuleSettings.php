<?php namespace Anomaly\Streams\Addon\Module\Settings;

class SettingsModuleSettings extends Settings
{

    /**
     * Available settings.
     *
     * @var array
     */
    protected $settings = [
        'general' => [
            [
                'email'       => [
                    'type' => 'email',
                ],
                'timezone'    => [
                    'type' => 'select',
                ],
                'date_format' => [
                    'type' => 'text',
                ],
                'time_format' => [
                    'type' => 'text',
                ]
            ],
        ],
    ];
}
 