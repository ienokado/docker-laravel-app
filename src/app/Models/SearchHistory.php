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
        // 検索回数TOP20の芸人IDを取得する（定数で指定）
        $top20 = self::select(\DB::raw('count(*) as count, comedian_group_id'))
            ->groupBy('comedian_group_id')
            ->orderBy('count', 'desc')
            ->limit(config('const.ranking.count'))
            ->pluck('comedian_group_id');

        // 芸人IDで絞り込んで検索回数で順位付け
        // TODO: paginateを使うとlimitが利用できないので同じこと二回してしまっている
        return self::select(\DB::raw('count(*) as count, comedian_group_id'))
            ->whereIn('comedian_group_id', $top20)
            ->groupBy('comedian_group_id')
            ->orderBy('count', 'desc')
            ->paginate(config('const.paginate.count'));

    }
}
