<?php

return [

    'frontend_cms' => false,

    'solve_to_post' => true,

    'default_language' => false,

    //    'languages' => [
    //        'nl' => 'Dutch',
    //        'en' => 'English',
    //    ],
    //
    //    'language_urls' => false,
    //
    //    'page' => [
    //        'ucwords_name' => true
    //    ],
    //
    //    'meta' => [
    //        'title'         => 'Title',
    //        'description'   => 'Description',
    //        'tags'          => 'tag1, tag2',
    //        'og:image'      => "public/images/logo.png",
    //    ]
    //
    //    'use_permissions' => true,
    //
    'widgets' => [
        'seo' => [
            'widget' => 'seo',
            'title' => 'SEO',
        ],
    ],

    'admin' => env('ADMIN_PASSWORD')
];
