<?php

namespace App\Http\Controllers\Api\Debayashi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Debayashi;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // 初期化
        $debayashi = null;
        // キーワードを取得
        $keyword = $request->input('q');

        // もしキーワードが入力されている場合
        if (!empty($keyword)) {
            $debayashi = Debayashi::getByKeyword($keyword);
        }

        // Spotify検索
        $this->spotifyService->search($debayashi);
        // Apple Music検索
        $this->appleMusicService->search($debayashi);
        // シェアボタン用テキストの取得
        $shareText = $this->getShareText($debayashi);

        return response()->json([
            'debayashi' => $debayashi,
            'share_text' => $shareText,
        ]);
    }
}
