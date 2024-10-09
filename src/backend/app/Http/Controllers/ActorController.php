<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Actor;
use ObjectManager;

class ActorController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Actor::class);

        parent::__construct();
    }
}
