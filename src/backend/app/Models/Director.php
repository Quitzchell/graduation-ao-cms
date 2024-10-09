<?php

namespace App\Models;

use Eloquent;
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

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
