<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $headers = Header::all();
        return view('Admin.headers.index', compact('headers'));
    }

    public function create()
    {
        return view('Admin.headers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',

        ]);

        Header::create($request->all());
        return redirect()->route('headers.index')->with('success', 'Ссылка добавлена');
    }

    public function edit($id)
    {
        $header_item = Header::find($id);
        return view('Admin.headers.edit', compact('header_item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);
        $header_item = Header::find($id);
        $header_item->update($request->all());
        return redirect()->route('headers.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        Header::destroy($id);
        return redirect()->route('headers.index')->with('success', 'Ссылка удалена');
    }
}
