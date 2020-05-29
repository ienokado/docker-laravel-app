<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComedianGroup extends Model
{
    public function debayashi()
    {
        return $this->belongsTo(Debayashi::class);
    }

    public static function searchByKeyword($ids, $keyword = null)
    {
        $query = self::whereIn('id', $ids);

        if (!is_null($keyword)) {
            $query->where(function ($query) use ($keyword) {
                $query
                    ->where('name', 'like', "%${keyword}%")
                    ->orWhereHas('debayashi', function ($query) use ($keyword) {
                        $query
                            ->where('name', 'like', "%${keyword}%")
                            ->orWhere('artist_name', 'like', "%${keyword}%");
                    });
            });
        }

        return $query->get();
    }
}
