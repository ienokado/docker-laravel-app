<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DebayashiController extends Controller
{
    public function index(Request $request)
    {
        //  TODO: ID検索
        // TODO: 芸人名で検索
        // TODO: アーティスト名で検索
        // TODO: 曲名で検索
    }

    public function edit(Request $request, $id = null)
    {
    }

    public function store(Request $request)
    {
    }
}
