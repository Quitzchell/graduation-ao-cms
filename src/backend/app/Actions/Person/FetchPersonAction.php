<?php

namespace App\Actions\Person;

use App\Models\DTO\PersonDTO;
use App\Models\Person;
use Illuminate\Http\JsonResponse;

class FetchPersonAction
{
    public function __invoke(string $uuid): JsonResponse
    {
        $person = Person::where('uuid', $uuid)->first();
        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        return response()->json(PersonDTO::make($person));
    }
}
