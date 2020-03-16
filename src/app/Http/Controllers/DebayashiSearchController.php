<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppleMusicInfo;
use App\Models\Debayashi;
use App\Models\SpotifyInfo;
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
        if (!is_null($debayashi) && is_null($debayashi->spotifyInfos)) {
            $this->spotifySearch($debayashi);
        }
        // Apple Music検索
        if (!is_null($debayashi) && is_null($debayashi->appleMusicInfos)) {
            $this->appleMusicSearch($debayashi);
        }
        // シェアボタン用テキストの取得
        $shareText = $this->getShareText($debayashi);

        //検索フォームへ
        return view('search.index', [
            'debayashi' => $debayashi,
            'shareText' => $shareText,
            'keyword' => $keyword,
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Debayashi $debayashi
     * @return void
     */
    private function getShareText($debayashi = null)
    {
        $text = "";

        if ($debayashi) {
            // 芸人名
            $comedianName = $debayashi->comedianGroups()->first()->name;
            // 出囃子名
            $debayashiName = $debayashi->name;
            // アーティスト名
            $artistName = $debayashi->artist_name;

            // コメントの生成
            $text .= "みんな知ってた？%0a";
            $text .= "「${comedianName}」の出囃子は・・・「${debayashiName} - ${artistName}」%0a";
            $text .= "%23" . env('APP_NAME');
        }

        return $text;
    }

    /**
     * Spotify APIでの曲検索
     * 該当がない場合は空で返す
     *
     * @param App\Models\Debayashi|null $debayashi
     * @return void
     */
    private function spotifySearch($debayashi)
    {
        // Client IDとClient Secretが設定されていない場合はSpotifyAPIを利用しない
        if ($debayashi && env('SPOTIFY_CLIENT_ID') && env('SPOTIFY_CLIENT_SECRET')) {
            $spotify = new SpotifyFacade();
            $query = $debayashi->artist_name . ' ' . $debayashi->name;
            try {
                $result = $spotify->search($query, 'track', ['market' => env('SPOTIFY_COUNTRY_CODE', 'JP')]);

                if (count($result) > 0) {
                    $spotifyInfo = new SpotifyInfo();
                    $spotifyInfo->fill([
                        'debayashi_id' => $debayashi->id,
                        // 画像のサイズは固定(300x300)
                        'image_url' => $result[0]->album->images[1]->url,
                        'external_url' => $result[0]->external_urls->spotify,
                        'preview_url' => $result[0]->preview_url,
                    ]);
                    $spotifyInfo->save();

                    $debayashi->refresh();
                }
            } catch (\Exception $e) {
                report($e);
            }
        }
    }

    /**
     * Apple Music APIでの曲検索
     * 該当がない場合は空で返す
     *
     * @param App\Models\Debayashi|null $debayashi
     * @return void
     */
    private function appleMusicSearch($debayashi)
    {
        // Team IDとKey IDとAuthKey Pathが設定されていない場合はApple Music APIを利用しない
        if ($debayashi && env('APPLE_TEAM_ID') && env('APPLE_KEY_ID') && env('APPLE_AUTH_KEY_PATH')) {
            $appleMusic = new AppleMusicFacade();
            $str = $debayashi->artist_name . ' ' . $debayashi->name;
            // TODO: AppleMusic検索で「&」の文字列がそのまま利用できないのでURLエンコードするなりして回避したい
            $query = str_replace(['&', '＆'], 'and', $str);

            try {
                $result = $appleMusic->search($query, 'songs');

                if (count($result) > 0) {
                    $appleMusicInfo = new AppleMusicInfo();
                    $appleMusicInfo->fill([
                        'debayashi_id' => $debayashi->id,
                        // 画像のサイズは固定(300x300)
                        'image_url' => str_replace(
                            ['{w}', '{h}'],
                            ['300', '300'],
                            $result[0]->attributes->artwork->url
                        ),
                        'external_url' => $result[0]->attributes->url,
                        'preview_url' => $result[0]->attributes->previews[0]->url,
                    ]);
                    $appleMusicInfo->save();

                    $debayashi->refresh();
                }
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}
