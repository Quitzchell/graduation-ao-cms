<?php

namespace App\Models;

use AO\Laravel\Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pet extends Eloquent
{
    protected $table = "pets";

    protected $fillable = [
        'name',
    ];

    /* Relations */

    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(Person::class);
    }

    public function ownerNames(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->owners->map(fn($owner) => implode(' ', [$owner->name, $owner->surname]))
                ->implode(', '),
        );
    }
}
