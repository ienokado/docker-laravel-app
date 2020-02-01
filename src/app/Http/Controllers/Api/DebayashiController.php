<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade as GoutteFacade;

class DebayashiController extends Controller
{
    public function index()
    {
        // ここではアマゾンカメラランキングをスクレイピング
        $goutte = GoutteFacade::request('GET', '');

        //テキストを取得
        $goutte->filter('.p13n-sc-truncate')->each(function ($node) use (&$texts) {
            $texts[] = $node->text();
        });
    }
}
