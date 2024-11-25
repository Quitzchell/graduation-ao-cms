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

        static::creating(function (self $model) {
            if (empty($model->slug)) {
                $slug = Str::slug(trim(implode(' ', [$model->name, $model->middle_name, $model->surname])));
                $count = 1;

                while ($model::where('slug', $slug)->exists()) {
                    $slug = "{$slug}-{$count}";
                    $count++;
                }

                $model->slug = $slug;
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
            get: fn() => implode(' ', array_filter([$this->name, $this->middle_name, $this->surname]))
        );
    }

    public function movieNames(): Attribute
    {
        return Attribute::make(
            get: fn() => implode(', ', $this->movies->map(fn($movie) => $movie->title)->toArray())
        );
    }
}
