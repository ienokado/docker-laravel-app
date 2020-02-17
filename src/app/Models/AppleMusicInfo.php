<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppleMusicInfo extends Model
{
    public function debayashi()
    {
        return $this->belongsTo(Debayashi::class);
    }
}
