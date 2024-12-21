<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $guarded = [];

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }
}
