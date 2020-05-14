<?php

return [
    'default' => 'local',
    'disks'   => [
        'local' => [
            'driver' => 'local',
            'root'   => getenv('HOME')."/.ploi-cli/",
        ],
        'config' => [
            'driver' => 'local',
            'root'   => getenv('HOME')."/.config/ploi-cli/",
        ],
    ],
];
