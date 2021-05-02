<?php

namespace App\Http\Controllers\Debayashi;

use App\Http\Controllers\Controller;
use App\Models\ComedianGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HistoryController extends Controller
{
    /**
     * 個々の検索履歴表示.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search_keyword');
        $comedianGroups = $this->getSearchHistories($keyword);

        return view('debayashi.history', [
            'comedianGroups' => $comedianGroups,
            'params' => ['search_keyword' => $keyword],
        ]);
    }

    /**
     * 検索履歴を返す.
     * @param string|null $keyword 検索キーワード
     *
     * @return ComedianGroup
     */
    private function getSearchHistories($keyword)
    {
        $_cookieName = 'Search_' . $this->cookieName;

        $ids = empty(explode(',', Cookie::get($_cookieName))) ? null : explode(',', Cookie::get($_cookieName));

        return ComedianGroup::searchByKeyword($ids, $keyword);
    }
}
