<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Subcat;
use Illuminate\Http\Request;

class SubcatController extends Controller
{
    public function index()
    {
        $subcats = Subcat::all();
        return view('Admin.subcats.index', compact('subcats'));
    }

    public function create()
    {
        $subcats = Subcat::all();
        return view('Admin.subcats.create', compact('subcats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',

        ]);

        $data = $request->all();

        $subcat = subcat::create($data);

        return redirect()->route('subcats.index')->with('success', 'Подкатегория добавлена');
    }

    public function edit($id)
    {
        $subcat = subcat::find($id);

        return view('Admin.subcats.edit', compact('subcat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $subcat = Subcat::find($id);
        $data = $request->all();
        $subcat->update($data);

//        $new->update($request->all());


        return redirect()->route('subcats.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
       $subcat = Subcat::find($id);
       $subcat->delete();
       return redirect()->route('subcats.index')->with('success', 'Подкатегория удалена');
    }
}
