<?php

namespace App\Services;

use App\Models\Debayashi;
use App\Models\SpotifyInfo;
use SpotifyFacade;

class SpotifyService
{
    /**
     * Spotify APIでの曲検索
     * 該当がない場合は空で返す
     *
     * @param App\Models\Debayashi|null $debayashi
     * @return void
     */
    public function search(Debayashi $debayashi = null)
    {
        // Client IDとClient Secretが設定されていない場合はSpotifyAPIを利用しない
        if (
            $debayashi && is_null($debayashi->spotifyInfos) &&
            env('SPOTIFY_CLIENT_ID') && env('SPOTIFY_CLIENT_SECRET')
        ) {
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
}
