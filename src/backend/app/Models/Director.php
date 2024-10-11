<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Director extends Eloquent
{
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    protected $table = 'directors';

    protected $fillable = [
        'name',
        'middle_name',
        'surname',
        'date_of_birth',
    ];

    /* Relations */

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }

    /* Attributes */

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => implode(' ', [$this->name, $this->middle_name, $this->surname])
        );
    }

    public function movieNames(): Attribute
    {
        return Attribute::make(
            get: fn () => implode(', ', $this->movies->map(fn ($movie) => $movie->title)->toArray())
        );
    }
}
