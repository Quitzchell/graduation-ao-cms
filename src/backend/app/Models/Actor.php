<?php

namespace App\Models;

use Eloquent;
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

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
