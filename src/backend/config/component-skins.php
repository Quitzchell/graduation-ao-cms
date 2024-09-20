<?php

$menu = (new \AO\Component\Helpers\MenuConfigBuilder())->build([
    'separator',
    app_path('Models/xml/Person.xml'),
    app_path('Models/xml/Pet.xml'),
    'separator',
    app_path('Models/xml/User.xml'),
]);

return [
    'title' => 'AllesOnline CMS',
    'prefix' => '/',
    'model_segment' => 2,
    'menu' => $menu
];
