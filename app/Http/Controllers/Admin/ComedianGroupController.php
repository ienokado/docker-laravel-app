<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Debayashi;
use App\Models\ComedianGroup;
use Http\Discovery\Exception\NotFoundException;
use Illuminate\Http\Request;

class ComedianGroupController extends Controller
{
    public function index(Request $request)
    {
        $query = ComedianGroup::query();

        $comedianGroups = $query->orderBy('created_at', 'desc')->get();

        return view('admin.comedian_group.index', [
            'comedianGroups' => $comedianGroups,
        ]);
    }

    public function edit(Request $request, $id = null)
    {
        // 新規登録
        if (is_null($id)) {
            $comedianGroup = new ComedianGroup();
        // 編集
        } else {
            $comedianGroup = ComedianGroup::find($id);
            if (is_null($comedianGroup)) {
                throw new NotFoundException();
            }
        }

        // セレクトボックス
        $debayashis = Debayashi::select('id', 'name')->orderBy('name', 'asc')->get();
        $selectValues = $debayashis->pluck('name', 'id');

        return view('admin.comedian_group.edit', [
            'comedianGroup' => $comedianGroup,
            'selectValues' => $selectValues,
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->id;
        // 新規登録
        if (is_null($id)) {
            $comedianGroup = new ComedianGroup();
        // 編集
        } else {
            $comedianGroup = ComedianGroup::find($id);
            if (is_null($comedianGroup)) {
                session()->flash('error_message', '保存ができませんでした。');
                return redirect()->route('admin.comedian_group.new');
            }
        }

        $comedianGroup->name = $request->name;
        $comedianGroup->debayashi_id = $request->debayashi_id;

        try {
            $comedianGroup->save();
            session()->flash('success_message', '保存しました。');
        } catch (\Exception $e) {
            session()->flash('error_message', '保存できませんでした。');
        }

        return redirect()->route('admin.comedian_group.edit', ['id' => $comedianGroup->id]);
    }

    public function delete(Request $request)
    {
    }
}
