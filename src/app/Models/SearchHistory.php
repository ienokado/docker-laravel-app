<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $fillable = ['keyword', 'debayashi_id', 'comedian_group_id', 'user_agent', 'ip_address', 'searched_at'];

    public function debayashi()
    {
        return $this->belongsTo(Debayashi::class);
    }

    public function comedianGroup()
    {
        return $this->belongsTo(ComedianGroup::class);
    }

    public static function getRanking()
    {
        // ランキング表示は20件まで（定数で指定）
        return self::select(\DB::raw('count(*) as count, comedian_group_id'))
            ->groupBy('comedian_group_id')
            ->orderBy('count', 'desc')
            ->limit(config('const.ranking.count'))
            ->paginate(config('const.paginate.count'));;
    }
}
