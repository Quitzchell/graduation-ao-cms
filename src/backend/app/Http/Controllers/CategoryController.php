<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use ObjectManager;
use App\Models\Category;

class CategoryController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Category::class);

        parent::__construct();
    }
}
