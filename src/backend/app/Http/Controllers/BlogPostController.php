<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\BlogPost;
use ObjectManager;

class BlogPostController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(BlogPost::class);

        parent::__construct();
    }
}
