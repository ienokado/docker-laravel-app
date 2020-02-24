<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debayashi;
use SpotifyFacade;
use AppleMusicFacade;

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

        // Spotify検索
        $spotifyValue = $this->spotifySearch($debayashi);
        // Apple Music検索
        $appleMusicValue = $this->appleMusicSearch($debayashi);

        //検索フォームへ
        return view('search.index', [
            'debayashi' => $debayashi,
            'spotifyValue' => $spotifyValue,
            'appleMusicValue' => $appleMusicValue,
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
            $spotify = new SpotifyFacade();
            $query = $debayashi->artist_name . ' ' . $debayashi->name;
            $result = $spotify->search($query, 'track', ['market' => env('SPOTIFY_COUNTRY_CODE', 'JP')]);

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

    /**
     * Apple Music APIでの曲検索
     * 該当がない場合は空で返す
     *
     * @param App\Models\Debayashi|null $debayashi
     * @return string $appleMusicValue
     */
    private function appleMusicSearch($debayashi)
    {
        // Apple Music情報
        $appleMusicValue = [];

        // Team IDとKey IDとAuthKey Pathが設定されていない場合はApple Music APIを利用しない
        if ($debayashi && env('APPLE_TEAM_ID') && env('APPLE_KEY_ID') && env('APPLE_AUTH_KEY_PATH')) {
            $appleMusic = new AppleMusicFacade();
            $query = $debayashi->artist_name . ' ' . $debayashi->name;
            $result = $appleMusic->search($query, 'songs');

            if (count($result) > 0) {
                $appleMusicValue = [
                    'name' => $result[0]->attributes->name,
                    // 画像のサイズは固定(300x300)
                    'image_url' => str_replace(['{w}', '{h}'], ['300', '300'], $result[0]->attributes->artwork->url),
                    'external_url' => $result[0]->attributes->url,
                    'preview_url' => $result[0]->attributes->previews[0]->url,
                ];
            }
        }

        return $appleMusicValue;
    }
}
