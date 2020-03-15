<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppleMusicInfo extends Model
{
    protected $fillable = ['debayashi_id', 'external_url', 'image_url', 'preview_url'];

    public function debayashi()
    {
        return $this->belongsTo(Debayashi::class);
    }
}
