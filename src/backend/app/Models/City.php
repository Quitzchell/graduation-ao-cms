<?php

namespace App\Models;

use AO\Laravel\Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Eloquent
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
        'country_id'
    ];

    /* Relations */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
