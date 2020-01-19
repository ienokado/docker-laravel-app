<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debayashi;

class DebayashiSearchController extends Controller
{
    public function index(Request $request)
    {
        // キーワードを取得
        $keyword = $request->input('search_keyword');

        // もしキーワードが入力されている場合
        if (!empty($keyword)) {
            $debayashis = Debayashi::getByKeyword($keyword);
        } else {
            $debayashis = Debayashi::find(1);
        }

        //検索フォームへ
        return view('search.index', [
            'debayashis' => $debayashis,
            'keyword' => $keyword,
        ]);
    }
}
