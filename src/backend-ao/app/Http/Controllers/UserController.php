<?php

namespace App\Http\Controllers;

use App\Models\User;
use ObjectManager;

class UserController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(User::class);

        parent::__construct();
    }
}
