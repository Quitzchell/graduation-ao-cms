<?php

namespace App\Models;

use AO\Laravel\Eloquent;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Eloquent
{
    protected $table = 'countries';

    protected $fillable = [
        'name'
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
