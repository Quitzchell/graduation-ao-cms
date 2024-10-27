<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\FrontendUser;
use ObjectManager;

class FrontendUserController extends ObjectManager
{
    public function __construct()
    {
        self::setModel(FrontendUser::class);

        parent::__construct();
    }
}
