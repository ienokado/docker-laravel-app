<?php

namespace App\Http\Controllers\Debayashi;

use App\Http\Controllers\Controller;
use App\Models\Debayashi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SearchController extends Controller
{
    /**
     * 出囃子検索.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        // 初期化
        $debayashi = null;
        // キーワードを取得
        $keyword = $request->input('search_keyword');

        // もしキーワードが入力されている場合
        if ($keyword) {
            $debayashi = Debayashi::getByKeyword($keyword);
            $this->setKeyword($debayashi);
        }

        // Spotify検索
        $this->spotifyService->search($debayashi);
        // Apple Music検索
        $this->appleMusicService->search($debayashi);
        // シェアボタン用テキストの取得
        $shareText = $this->getShareText($debayashi);

        //検索フォームへ
        return view('debayashi.search', [
            'debayashi' => $debayashi,
            'shareText' => $shareText,
            'keyword' => $keyword,
        ]);
    }

    private function setKeyword(Debayashi $debayashi)
    {
        // 出囃子
        if (is_null($debayashi)) {
            return;
        }

        $_cookieName = $this->cookieName . '_History';

        $ids = Cookie::get($_cookieName);

        // 初回以降かつ検索されていない出囃子の場合
        if (!is_null($ids) && strpos($ids, (string) $debayashi->id) === false) {
            $ids .= ',' . $debayashi->id;
        // 初回のみ
        } else if (is_null($ids)) {
            $ids .= (string) $debayashi->id;
        }

        Cookie::queue(Cookie::make($_cookieName, $ids));
    }
}
