<?php

return [
    [
        'fields' => [
            'email'       => [
                'type'  => 'email',
                'value' => 'service@aiwebsystems.com',
            ],
            'timezone'    => [
                'type' => 'select',
            ],
            'date_format' => [
                'type'  => 'text',
                'rules' => 'required',
            ],
            'time_format' => [
                'type' => 'text',
            ],
        ],
    ],
];