<?php

$menu = (new \AO\Component\Helpers\MenuConfigBuilder())->build();

return [
    'title' => 'AllesOnline CMS',
    'prefix' => '/admin/',
    'model_segment' => 2,
    'menu' => $menu
];
