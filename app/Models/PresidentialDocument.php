<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PresidentialDocument extends Model
{
    protected $guarded = [];

    public function presidential_votes(): HasMany
    {
        return $this->hasMany(PresidentialVote::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
