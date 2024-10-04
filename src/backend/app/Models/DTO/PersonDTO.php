<?php

namespace App\Models\DTO;

use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class PersonDTO
{
    public string $fullName;

    public function __construct(
        public ?string $uuid,
        public ?string $name,
        public ?string $middleName,
        public ?string $surname,
        public ?array  $birth,
        public ?array  $death,
        public ?string $gender,
        public ?string $image,
        public ?Collection  $partners,
        public ?Collection  $parents,
        public ?Collection  $children
    )
    {
        $this->fullName = implode(' ', [$this->name, $this->middleName, $this->surname]);
    }

    public static function make(Person $person)
    {
        $birth = [
            'date' => Carbon::parse($person->date_of_birth),
            'city' => $person->placeOfBirth->name,
            'country' => $person->placeOfBirth->country->name
        ];

        $death = [
            'date' => Carbon::parse($person->date_of_death),
            'city' => $person->placeOfDeath->name,
            'country' => $person->placeOfDeath->country->name
        ];

        return new self(
            $person->uuid,
            $person->name,
            $person->middle_name ?? null,
            $person->surname,
            $birth,
            $death,
            $person->gender,
            mediaItemURL($person->profile_img),
            $person->spouses->pluck('uuid'),
            $person->parents->pluck('uuid'),
            $person->children->pluck('uuid'),
        );
    }
}
