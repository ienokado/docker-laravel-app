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
        $comedianGroups = $this->getSearchHistories();

        return view('debayashi.history', [
            'comedianGroups' => $comedianGroups,
        ]);
    }

    /**
     * 検索履歴を返す.
     *
     * @return ComedianGroup
     */
    private function getSearchHistories()
    {
        $_cookieName = 'Search_' . $this->cookieName;

        $ids = explode(',', Cookie::get($_cookieName));

        return ComedianGroup::find($ids);
    }
}
