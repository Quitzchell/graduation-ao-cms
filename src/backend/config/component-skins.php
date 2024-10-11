<?php

use AO\Component\Helpers\MenuConfigBuilder;

$menu = (new MenuConfigBuilder)->build([
    'mediamanager',
    'separator',
    app_path('Models/xml/BlogPost.xml'),
    app_path('Models/xml/Category.xml'),
    'separator',
    app_path('Models/xml/Review.xml'),
    'separator',
    app_path('Models/xml/Movie.xml'),
    app_path('Models/xml/Actor.xml'),
    app_path('Models/xml/Director.xml'),
    'separator',
    app_path('Models/xml/Book.xml'),
    app_path('Models/xml/Author.xml'),
    'separator',
    app_path('Models/xml/User.xml'),
    app_path('Models/xml/FrontendUser.xml'),
]);

return [
    'title' => 'AllesOnline CMS',
    'prefix' => '/',
    'model_segment' => 1,
    'menu' => $menu,
];
