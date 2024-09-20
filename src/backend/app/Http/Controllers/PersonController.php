<?php

namespace App\Http\Controllers;

use App\Models\Person;
use ObjectManager;

class PersonController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Person::class);

        parent::__construct();
    }
}
