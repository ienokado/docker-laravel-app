<?php

namespace App\Http\Controllers\Debayashi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * ランキング表示.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return view('debayashi.ranking');
    }
}
