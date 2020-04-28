<?php

namespace App\Http\Controllers\Debayashi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * 個々の検索履歴表示
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return view('debayashi.history', [
            'historyExists' => true,    // モック動作確認用
        ]);
    }
}
