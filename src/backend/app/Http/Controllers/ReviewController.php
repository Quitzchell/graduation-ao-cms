<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Review;
use ObjectManager;

class ReviewController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Review::class);

        parent::__construct();
    }
}
