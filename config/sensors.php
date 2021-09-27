<?php

use App\Sensors\MultiRandomTinyint;
use App\Sensors\RandomTinyint;

return [
    [
        'class' => RandomTinyint::class,
        'enable' => env('SENSOR_RANDOM_TINYINT_ENABLE', true),
        'options' => [
            'name' => 'random_tinyint',
            'tags' => ['hostname' => gethostname()],
        ],
    ],
    [
        'class' => MultiRandomTinyint::class,
        'enable' => env('SENSOR_MULTI_RANDOM_TINYINT_ENABLE', true),
        'options' => [
            'name' => 'multi_random_tinyint',
        ],
    ]
];
