<?php

namespace App\Services;

use App\Models\AppleMusicInfo;
use App\Models\Debayashi;
use AppleMusicFacade;
class AppleMusicService
{
    /**
     * Apple Music APIでの曲検索
     * 該当がない場合は空で返す
     *
     * @param App\Models\Debayashi|null $debayashi
     * @return void
     */
    public function search(Debayashi $debayashi = null)
    {
        // Team IDとKey IDとAuthKey Pathが設定されていない場合はApple Music APIを利用しない
        if (
            $debayashi && is_null($debayashi->appleMusicInfos) &&
            env('APPLE_TEAM_ID') && env('APPLE_KEY_ID') && env('APPLE_AUTH_KEY_PATH')
        ) {
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
