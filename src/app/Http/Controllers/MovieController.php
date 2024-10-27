<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Movie;
use ObjectManager;

class MovieController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Movie::class);

        parent::__construct();
    }
}
