<?php

namespace App\Models\DTO;

use App\Models\FrontendUser;
use Illuminate\Support\Collection;

class PersonDTO
{
    public string $fullName;

    public function __construct()
    {
    }

    public static function make(FrontendUser $person)
    {
    }
}
