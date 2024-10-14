<?php

namespace App\Models\DTO;

use App\Models\Actor;

class ActorDTO
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

    public static function make(Actor $actor)
    {
        return new self(
            $actor->name,
            $actor->middle_name,
            $actor->surname,
            $actor->date_of_birth,
        );
    }
}
