<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debayashi extends Model
{
    public function comedianGroups()
    {
        return $this->hasMany(ComedianGroup::class);
    }

    public function spotifyInfos()
    {
        return $this->hasOne(SpotifyInfo::class);
    }

    public function appleMusicInfos()
    {
        return $this->hasOne(AppleMusicInfo::class);
    }

    public static function getByKeyword(string $keyword = null)
    {
        return self::whereHas('comedianGroups', function ($query) use ($keyword) {
            $query->where('name', "${keyword}");
        })->first();
    }
}
