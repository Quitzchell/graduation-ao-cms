<?php

namespace App\Models\DTO;

use App\Models\Director;

class DirectorDTO
{
    public ?string $fullName;
    public function __construct(
        public ?string $name,
        public ?string $middleName,
        public ?string $surname,
        public ?string $dateOfBirth
    )
    {
        $this->fullName = implode(' ', array_filter([$name, $middleName, $surname]));
    }

    public static function make(Director $director)
    {
        return new self(
            $director->name,
            $director->middle_name,
            $director->surname,
            $director->date_of_birth,
        );
    }
}
