<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected $cookieName;
    public function __construct()
    {
      //cookieで表示回数を保持
      $this->cookieName = str_replace('Controller', '', (new \ ReflectionClass($this))-> getShortName()).'_DispCount';
      $value = 1;
      if (isset($_COOKIE[$this->cookieName])) {
        $value += $_COOKIE[$this->cookieName];
      }
      setcookie($this->cookieName, $value, time() + config('const.cookie_expire.dispCount'), '/', '', false, false);
    }
}
