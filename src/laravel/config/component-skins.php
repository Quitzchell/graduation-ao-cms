<?php

$menu = (new \AO\Component\Helpers\MenuConfigBuilder())->build();

return [
    'title' => 'AllesOnline CMS',
    'prefix' => '/',
    'model_segment' => 1,
    'menu' => $menu
];
