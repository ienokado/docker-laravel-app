<?php

namespace App\Http\Controllers;

use App\Exceptions\OnlyMobileException;
use App\Services\AppleMusicService;
use App\Services\SpotifyService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Jenssegers\Agent\Agent;

class Controller extends BaseController
{
    protected $appleMusicService;

    protected $spotifyService;

    public function __construct(Request $request, AppleMusicService $appleMusicService, SpotifyService $spotifyService)
    {
        $this->appleMusicService = $appleMusicService;
        $this->spotifyService = $spotifyService;

        // 管理画面のURLの場合は無視
        if ($request->is('admin') || $request->is('admin/*')) {
            return;
        }

        // 本番環境の場合、PCでのアクセスはエラーとする
        if (\App::environment() === 'production' && !$this->isMobile($request)) {
            throw new OnlyMobileException();
        }

        // Cookieが設定されていない場合に設定
        if (is_null(Cookie::get($this->getCookieName()))) {
            $this->setCookie();
        }
    }

    /**
     * スマホ端末かどうか判定する
     *
     * @param Request $request
     * @return boolean
     */
    protected function isMobile($request)
    {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return true;
        }

        return false;
    }

    /**
     * Cookie名を取得する
     *
     * @return string
     */
    protected function getCookieName()
    {
        // 動作しているController名を取得する
        $controllerName = str_replace('Controller', '', (new \ReflectionClass($this))->getShortName());

        return $controllerName . '_DispCount';
    }

    /**
     * Cookieを設定する
     *
     * @return void
     */
    protected function setCookie()
    {
        // 30日間の有効期限
        $expireTime = time() + config('const.cookie_expire.disp_count');

        Cookie::queue(Cookie::make($this->getCookieName(), 1, $expireTime));
    }

    /**
     * SNSシェア用のコメント生成
     *
     * @param Debayashi $debayashi
     * @return void
     */
    protected function getShareText($debayashi = null)
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
            $text .= "「${comedianName}」の出囃子は・・・%0a";
            $text .= "「${debayashiName} - ${artistName}」%0a";
            if ($debayashi->spotifyInfos) {
                $externalUrl = $debayashi->spotifyInfos->external_url;
                $text .= "${externalUrl}%0a";
            } elseif ($debayashi->appleMusicInfos) {
                $externalUrl = $debayashi->appleMusicInfos->external_url;
                $text .= "${externalUrl}%0a";
            }
            $text .= "%23" . env('APP_NAME');
        }

        return $text;
    }
}
