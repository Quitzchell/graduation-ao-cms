<?php

namespace App\Models;

use AO\Component\Models\Traits\HasContent;
use App\Rules\EmptyIf;
use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Review extends Eloquent
{
    use HasContent;

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    protected $table = 'reviews';

    protected $fillable = [
        'title',
        'excerpt',
        'score',
    ];

    /* Relations */

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }

    /* Attributes */

    public function subject(): Attribute
    {
        return Attribute::make(
            get: fn() => array_first(array_filter([$this->movies->first()->title, $this->books?->first()?->title]))
        );
    }

    public function subjectType(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->movies->count() > 0 ? 'Movie' : 'Book'
        );
    }

    /* Validation */
    public static function validatorAddRules(): array
    {
        return [
            'title' => 'required',
            'excerpt' => 'required',
            'books' => [
                'nullable',
                'required_without:movies',
                new EmptyIf(
                    'movies',
                    'Only one object can be reviewed at a time',
                ),
            ],
            'movies' => [
                'nullable',
                'required_without:books',
                new EmptyIf(
                    'books',
                    'Only one object can be reviewed at a time',
                ),
            ],
        ];
    }

    public function validatorEditRules(): array
    {
        return static::validatorAddRules();
    }

    protected static function validatorMessages(): array
    {
        return [
            // General validation messages
            'title.required' => 'The title field is required.',
            'excerpt.required' => 'The excerpt field is required.',

            // Books field validation messages
            'books.required_without' => 'The books field is required when no movies are provided.',

            // Movies field validation messages
            'movies.required_without' => 'The movies field is required when no books are provided.',
        ];
    }
}
