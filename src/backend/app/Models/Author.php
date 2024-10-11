<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Author extends Eloquent
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

    protected $table = 'authors';

    protected $fillable = [
        'name',
        'middle_name',
        'surname',
        'birthdate',
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
