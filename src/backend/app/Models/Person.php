<?php

namespace App\Models;

use AO\Laravel\Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Person extends Eloquent implements UrlAble
{
    protected $table = 'people';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    protected $fillable = [
        "name",
        "surname",
        "gender",
        "date_of_birth",
        "date_of_death",
        "place_of_birth",
        "place_of_death"
    ];

    /* Relations */
    public function spouses(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'person_spouses', 'person_id', 'spouse_id');
    }

    public function reverseSpouses(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'person_spouses', 'spouse_id', 'person_id');
    }

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'child_parents', 'child_id', 'parent_id');
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'child_parents','parent_id', 'child_id');
    }

    public function placeOfBirth(): BelongsTo
    {
        return $this->belongsTo(City::class, 'place_of_birth_id')->with('Country');
    }

    public function placeOfDeath(): BelongsTo
    {
        return $this->belongsTo(City::class, 'place_of_death_id')->with('Country');
    }

    /* Attributes */

    public function spouseNames(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->getFormattedSpouseNames()
        );
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => implode(' ', [$this->name, $this->middle_name, $this->surname])
        );
    }

    public function parentNames(): Attribute
    {
        return Attribute::make(
            get: fn() => implode(', ', $this->parents->map(fn($parent) => $parent->full_name)->toArray())
        );
    }

    /* Helpers */
    public function allSpouses()
    {
        return $this->spouses->merge($this->reverseSpouses);
    }

    private function getFormattedSpouseNames(): string
    {
        $spouses = $this->spouses->merge($this->reverseSpouses);
        $names = $spouses->map(fn($spouse) => "{$spouse->name} {$spouse->surname}");
        return $names->implode(', ');
    }
}
