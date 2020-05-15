<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $fillable = ['keyword', 'debayashi_id', 'comedian_group_id', 'user_agent', 'ip_address', 'searched_at'];

    public static function getRanking()
    {
        // ランキング表示は10件まで（定数で指定）
        return self::select(\DB::raw('count(*) as count, comedian_group_id'))
            ->groupBy('comedian_group_id')
            ->orderBy('count')
            ->limit(config('const.ranking.count'))
            ->get();
    }
}
