<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;
use ObjectManager;

class BookController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(Book::class);

        parent::__construct();
    }
}
