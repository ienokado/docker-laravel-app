<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debayashi extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'debayashis';

    /**
     * Get all of the groups for the debayashi.
     */
    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public static function getByKeyword(string $keyword = null)
    {
        return Debayashi::whereHas('groups', function ($query) use ($keyword) {
            $query->where('name', 'like', "%${keyword}%");
        })->get();
    }
}
