<?php

namespace App\Http\Controllers;

use AO\Component\Http\Controllers\Traits\SingleInstanceManager;
use App\Models\Settings;
use ObjectManager;

class SettingsController extends ObjectManager
{
    use SingleInstanceManager;

    public function __construct()
    {
        self::setModel(Settings::class);
        parent::__construct();
    }
}
