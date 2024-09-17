<?php

namespace App\Http\Controllers;

use AO\Component\Http\Controllers\Traits\SingleInstanceManager;
use ObjectManager;
use App\Models\Settings;

class SettingsController extends ObjectManager
{
    use SingleInstanceManager;

    public function __construct()
    {
        self::setModel(Settings::class);
        parent::__construct();
    }
}
