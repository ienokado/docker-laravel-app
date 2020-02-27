<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    public function __construct(Request $request)
    {
        // PCの場合404にする
        if (!$this->isMobile($request)) {
            return abort(404);
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
        $userAgent = $request->header('User-Agent');
        if ((strpos($userAgent, 'iPhone') !== false) || (strpos($userAgent, 'Android') !== false)) {
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
}
