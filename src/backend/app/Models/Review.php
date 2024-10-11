<?php

namespace App\Models;

use App\Rules\EmptyIf;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Review extends Eloquent
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

    protected $table = 'reviews';

    protected $fillable = [
        'title',
        'excerpt',
        'score',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }

    /* Validation */
    public static function validatorAddRules(): array
    {
        return [
            'title' => 'required',
            'excerpt' => 'required',
            'books' => [
                'nullable',
//                'required_without:movies',
                'prohibited_if:movies,!=,null',
            ],
            'movies' => [
                'nullable',
//                'required_without:books',
                'prohibited_if:books,!=,null',
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
            'books.prohibited_if' => 'The books field must be empty if movies are provided.',

            // Movies field validation messages
            'movies.required_without' => 'The movies field is required when no books are provided.',
            'movies.prohibited_if' => 'The movies field must be empty if books are provided.',
        ];
    }

}
