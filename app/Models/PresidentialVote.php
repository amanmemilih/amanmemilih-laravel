<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PresidentialVote extends Model
{
    protected $guarded = [];

    public function presidential_candidat(): BelongsTo
    {
        return $this->belongsTo(PresidentialCandidat::class);
    }
}
