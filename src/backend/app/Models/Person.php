<?php

namespace App\Models;

use AO\Laravel\Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Eloquent
{
    protected $table = 'people';

    protected $fillable = [
        "name",
        "surname",
        "gender",
        "partner_id",
    ];

    /* Relations */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(self::class, 'partner_id');
    }

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'person_parent', 'person_id', 'parent_id');
    }

    public function pets(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class);
    }

    /* Attributes */

    public function partnerName(): Attribute
    {
        return Attribute::make(
            get: fn () => implode(' ', [$this->partner->name, $this->partner->surname])
        );
    }

    public function parentNames(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->parents->map(fn($parent) => implode(' ', [$parent->name, $parent->surname]))
                ->implode(', '),
        );
    }

    public function petNames(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->pets()->pluck('name')->implode(', ')
        );
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => implode(' ', [$this->name, $this->surname])
        );
    }
}
