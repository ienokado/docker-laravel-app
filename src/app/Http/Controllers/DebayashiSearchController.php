<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debayashi;
use SpotifyService;

class DebayashiSearchController extends Controller
{
    public function index(Request $request)
    {
        // 初期化
        $debayashis = null;
        // Spotify情報
        $spotifyValue = [];
        // キーワードを取得
        $keyword = $request->input('search_keyword');

        // もしキーワードが入力されている場合
        if (!empty($keyword)) {
            $debayashis = Debayashi::getByKeyword($keyword);
            $spotify = new SpotifyService();
            $query = $debayashis[0]->artist_name. ' '. $debayashis[0]->name;
            $result = $spotify->search($query, $type = 'track', $options = ['market' => 'JP']);

            if (count($result) > 0) {
                $spotifyValue = [
                    'name' => $result[0]->name,
                    'external_url' => $result[0]->external_urls->spotify,
                    'preview_url' => $result[0]->preview_url,
                ];
            }
        }

        //検索フォームへ
        return view('search.index', [
            'debayashis' => $debayashis,
            'spotifyValue' => $spotifyValue,
            'keyword' => $keyword,
        ]);
    }
}
