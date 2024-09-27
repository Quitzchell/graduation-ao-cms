<?php

return [
    'server' => [

        'filesystem' => [

            'source' => env('MEDIA_MANAGER_SOURCE_DISK', env("FILESYSTEM_DISK")),

            'cache' => env('MEDIA_MANAGER_CACHE_DISK', env("FILESYSTEM_DISK")),

        ],

        'source_path_prefix' => env('MEDIA_MANAGER_SOURCE_PATH_PREFIX', 'uploads'),

        'cache_path_prefix' => env('MEDIA_MANAGER_CACHE_PATH_PREFIX', 'cache'),

        'defaults' => [

            'format' => env('MEDIA_MANAGER_DEFAULT_FORMAT'),

            'quality' => env('MEDIA_MANAGER_DEFAULT_QUALITY', 90),

        ],

        'presets' => [

            'thumbnail' => [
                'w' => 30,
                'h' => 30,
            ],

        ],

    ],

];
