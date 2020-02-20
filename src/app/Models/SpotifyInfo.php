<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotifyInfo extends Model
{
    public function debayashi()
    {
        return $this->belongsTo(Debayashi::class);
    }
}
