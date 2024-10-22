<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Author extends Eloquent
{
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $slug = Str::slug(trim(implode(' ',[$model->name, $model->middle_name, $model->surname])));
                $count = 1;

                while ($model::where('slug', $slug)->exists()) {
                    $slug = "{$slug}-{$count}";
                    $count++;
                }

                $model->slug = $slug;
            }
        });
    }

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'middle_name',
        'surname',
        'date_of_birth',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /* Attributes */

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => implode(' ', [$this->name, $this->middle_name, $this->surname])
        );
    }
}
