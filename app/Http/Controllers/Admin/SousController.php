<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Sous;
use App\Models\Subcat;
use Illuminate\Http\Request;

class SousController extends Controller
{
    public function index()
    {
        $souses = Sous::all();
        return view('Admin.souses.index', compact('souses'));
    }

    public function create()
    {
        $souses = Sous::all();
        $sub_categories = Subcat::all();
        return view('Admin.souses.create', compact('souses', 'sub_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'sub_category_id' => 'required',
            'link' => 'nullable',
            'image' => 'image|nullable',
            'marinade' => 'required',

        ]);

        $data = $request->all();

        $data['image'] = Sous::uploadImage($request);

        $sous = Sous::create($data);

        return redirect()->route('souses.index')->with('success', 'Соус добавлен');
    }

    public function edit($id)
    {
        $sous = Sous::find($id);
        $sub_categories = Subcat::all();

        return view('Admin.souses.edit', compact('sous', 'sub_categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'sub_category_id' => 'required',
            'link' => 'nullable',
            'image' => 'image|nullable',
            'marinade' => 'required',
        ]);

        $sous = Sous::find($id);
        $data = $request->all();

        $data['image'] = Sous::uploadImage($request, $sous->image);

        $sous->update($data);

//        $new->update($request->all());


        return redirect()->route('souses.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
       $sous = Sous::find($id);
       Storage::delete($sous->image);
       $sous->delete();
       return redirect()->route('souses.index')->with('success', 'Соус удален');
    }
}
