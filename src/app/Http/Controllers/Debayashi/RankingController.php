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
        // 検索回数ランキングを順位付で取得
        $searchHistories = SearchHistory::getRanking();

        return view('debayashi.ranking', [
            'searchHistories' => $searchHistories,
        ]);
    }
}
