<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use ObjectManager;

class CategoryController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Category::class);

        parent::__construct();
    }
}
