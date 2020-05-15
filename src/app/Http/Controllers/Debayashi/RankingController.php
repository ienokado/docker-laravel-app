<?php

namespace App\Http\Controllers\Debayashi;

use App\Http\Controllers\Controller;
use App\Models\SearchHistory;
use App\Models\Debayashi;
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
        $debayashis = [];
        $rankingData = SearchHistory::getRanking();
        foreach ($rankingData as $data) {
            try {
                $debayashi = Debayashi::find($data->debayashi_id);
                $debayashis[] = $debayashi;
            } catch (\Exception $e) {
                continue;
            }
        }

        return view('debayashi.ranking', [
            'debayashis' => $debayashis
        ]);
    }
}
