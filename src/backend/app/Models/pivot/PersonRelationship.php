<?php

namespace App\Models\pivot;

use App\Models\Person;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PersonRelationship extends Pivot
{
    protected $table = 'person_relationships';

    /* Relations */

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id', 'partner_id');
    }
}
