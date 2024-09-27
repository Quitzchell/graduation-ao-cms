<?php

namespace App\Models;

use AO\Laravel\Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Eloquent
{
    protected $table = 'people';

    protected $fillable = [
        "name",
        "surname",
        "gender",
        "date_of_birth",
        "date_of_death",
    ];

    /* Relations */
    public function relationships(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'person_relationships', 'person_id', 'partner_id')
            ->withPivot('relationship_type');
    }

    public function reverseRelationships(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'person_relationships', 'partner_id', 'person_id')
            ->withPivot('relationship_type');
    }

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'child_parents', 'child_id', 'parent_id');
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'child_parents','parent_id', 'child_id');
    }

    /* Attributes */

    public function relationshipNames(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->getFormattedRelationshipNames()
        );
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => implode(' ', [$this->name, $this->surname])
        );
    }

    public function parentNames(): Attribute
    {
        return Attribute::make(
            get: fn() => implode(', ', $this->parents->map(fn($parent) => $parent->full_name)->toArray())
        );
    }

    /* Helpers */
    public function allRelationships()
    {
        return $this->relationships->merge($this->reverseRelationships);
    }

    private function getFormattedRelationshipNames(): string
    {
        $relationships = $this->relationships->merge($this->reverseRelationships);
        $names = $relationships->map(fn($relationship) => "{$relationship->name} {$relationship->surname}");
        return $names->implode(', ');
    }
}
