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
        $debayashi = null;
        // キーワードを取得
        $keyword = $request->input('search_keyword');

        // もしキーワードが入力されている場合
        if (!empty($keyword)) {
            $debayashi = Debayashi::getByKeyword($keyword);
        }

        // spotify検索
        $spotifyValue = $this->spotifySearch($debayashi);

        //検索フォームへ
        return view('search.index', [
            'debayashi' => $debayashi,
            'spotifyValue' => $spotifyValue,
            'keyword' => $keyword,
        ]);
    }

    /**
     * Spotify APIでの曲検索
     * 該当がない場合は空で返す
     *
     * @param App\Models\Debayashi|null $debayashi
     * @return string $spotifyValue
     */
    private function spotifySearch($debayashi)
    {
        // Spotify情報
        $spotifyValue = [];

        // Client IDとClient Secretが設定されていない場合はSpotifyAPIを利用しない
        if ($debayashi && env('SPOTIFY_CLIENT_ID') && env('SPOTIFY_CLIENT_SECRET')) {
            $spotify = new SpotifyService();
            $query = $debayashi->artist_name . ' ' . $debayashi->name;
            $result = $spotify->search($query, 'track', ['market' => 'JP']);

            if (count($result) > 0) {
                $spotifyValue = [
                    'name' => $result[0]->name,
                    // 画像のサイズは固定(300x300)
                    'image_url' => $result[0]->album->images[1]->url,
                    'external_url' => $result[0]->external_urls->spotify,
                    'preview_url' => $result[0]->preview_url,
                ];
            }
        }

        return $spotifyValue;
    }

    private function twitterShareLink()
    {
    }
}
