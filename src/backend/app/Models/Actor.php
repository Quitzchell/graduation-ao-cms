<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Actor extends Eloquent
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

    protected $table = 'actors';

    protected $fillable = [
        'name',
        'middle_name',
        'surname',
        'date_of_birth',
    ];

    /* Relations */

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
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
