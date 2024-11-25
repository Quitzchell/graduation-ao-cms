<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Director;
use ObjectManager;

class DirectorController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Director::class);

        parent::__construct();
    }
}
