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

    protected $cookieName;

    /**
     * initialize.
     *
     * @param Request $request
     * @param Agent $agent
     * @param AppleMusicService $appleMusicService
     * @param SpotifyService $spotifyService
     */
    public function __construct(Request $request, Agent $agent, AppleMusicService $appleMusicService, SpotifyService $spotifyService)
    {
        $this->appleMusicService = $appleMusicService;
        $this->spotifyService = $spotifyService;
        $this->cookieName = $this->getCookieName();

        // 管理画面のURLの場合は無視
        if ($request->is('admin') || $request->is('admin/*')) {
            return;
        }

        // 本番環境の場合、PCでのアクセスはエラーとする
        if (\App::environment() === 'production' && !$agent->isMobile()) {
            throw new OnlyMobileException();
        }

        $this->setCookie($request);
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

        return $controllerName;
    }

    /**
     * Cookieを設定する
     *
     * @return void
     */
    protected function setCookie(Request $request)
    {
        switch ($this->cookieName) {
            // TOPページのアニメーションは初めの1回のみ
            case "Top":
                $_cookieName = $this->cookieName . '_DispCount';
                // Cookieが設定されていない場合に設定
                if (is_null(Cookie::get($_cookieName))) {
                    // 30日間の有効期限
                    $expireTime = time() + config('const.cookie_expire.disp_count');
                    Cookie::queue(Cookie::make($_cookieName, 1, $expireTime));
                }
                break;
            default:
                break;
        }
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
