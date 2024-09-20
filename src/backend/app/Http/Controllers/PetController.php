<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use ObjectManager;

class PetController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Pet::class);

        parent::__construct();
    }
}
