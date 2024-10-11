<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Movie extends Eloquent
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

    protected $table = 'movies';

    protected $fillable = [
        'title',
        'director_id',
        'released_year',
        'description',
        'review_id',
    ];

    /* Relations */

    public function reviews(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }

    /* Attributes */
    public function directorName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->director?->full_name,
        );
    }

    public function actorNames(): Attribute
    {
        return Attribute::make(
            get: fn () => implode(', ', $this->actors->map(fn ($actor) => $actor->full_name)->toArray()),
        );
    }

    /* Attributes */
    public function releaseYearFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->release_year)->format('Y')
        );
    }
}
