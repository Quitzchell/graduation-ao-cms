<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Author;
use ObjectManager;

class AuthorController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Author::class);

        parent::__construct();
    }
}
