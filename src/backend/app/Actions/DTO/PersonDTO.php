<?php

namespace App\Actions\DTO;

use App\Models\Person;

class PersonDTO
{
    public function __construct(
        public ?string $name,
        public ?string $middleName,
        public ?string $surname,
        public ?array $birth,
        public ?array $death,
        public ?string $gender,
        public ?string $image,
        public ?array  $parents,
    )
    {
    }

    public static function make(Person $person)
    {
        $parents = $person->parents;
        $birth = [
            'date' => $person->date_of_birth,
            'city' => $person->nationality->name,
            'country' => $person->nationality->country->name
        ];

        $death = [
            'date' => $person->date_of_death,
            'city' => $person->placeOfDeath->name,
            'country' => $person->placeOfDeath->country->name
        ];

        return new self(
            $person->name,
            $person->middle_name ?? null,
            $person->surname ?? null,
            $birth,
            $death,
            $person->gender,
            $person->profile_img,
            $parents->map(fn($parent) => self::make($parent))->toArray(),
        );

    }
}
