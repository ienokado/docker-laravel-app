<?php

namespace App\Http\Controllers\Debayashi;

use App\Http\Controllers\Controller;
use App\Models\SearchHistory;
use App\Models\ComedianGroup;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * ランキング表示.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $comedianGroups = [];
        $rankingData = SearchHistory::getRanking();
        foreach ($rankingData as $data) {
            try {
                $comedianGroup = ComedianGroup::find($data->comedian_group_id);
                $comedianGroups[] = $comedianGroup;
            } catch (\Exception $e) {
                continue;
            }
        }

        // ページネーション用データ生成
        $comedianGroups = $this->makePagination($request, $comedianGroups, config('const.paginate.count'));

        return view('debayashi.ranking', [
            'comedianGroups' => $comedianGroups,
        ]);
    }
}
