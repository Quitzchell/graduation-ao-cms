<?php

use AO\Component\Helpers\MenuConfigBuilder;

$menu = (new MenuConfigBuilder())->build([
    'mediamanager',
    'separator',
    app_path('Models/xml/Person.xml'),
    'separator',
    app_path('Models/xml/User.xml'),
]);

return [
    'title' => 'AllesOnline CMS',
    'prefix' => '/',
    'model_segment' => 1,
    'menu' => $menu
];
