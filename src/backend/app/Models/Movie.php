<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Movie extends Eloquent
{
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model) {
            if (empty($model->slug)) {
                $slug = Str::slug($model->title);
                $count = 1;

                while ($model::where('slug', $slug)->exists()) {
                    $slug = "{$slug}-{$count}";
                    $count++;
                }

                $model->slug = $slug;
            }
        });

        static::saving(function ($model) {
            if ($model->release_year) {
                $model->release_year = Carbon::parse($model->release_year)->format('Y');
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

    public function review(): BelongsTo
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

    /* Validation */

    public static function validatorAddRules(): array
    {
        return [
            'title' => 'required',
            'director_id' => 'required',
            'actors' => 'nullable',
            'description' => 'required',
            'release_year' => 'required',
        ];
    }

    public function validatorEditRules(): array
    {
        return static::validatorAddRules();
    }

    protected static function validatorMessages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'director_id.required' => 'The director field is required.',
            'actors.nullable' => 'The actors field is optional.',
            'description.required' => 'The description field is required.',
            'release_year.required' => 'The release year field is required.',
        ];
    }
}
