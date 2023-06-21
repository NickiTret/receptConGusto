<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meat;
use Illuminate\Http\Request;

class MeatController extends Controller
{

    public function index()
    {
        $meats = Meat::all();
        return view('Admin.meat.index', compact('meats'));
    }


    public function create()
    {
        return view('Admin.meat.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'svg_meat' => 'required|image|mimes:svg',
        ]);

        $data = $request->all();

        $data['svg_meat'] = Meat::uploadImage($request);

        $meat = Meat::create($data);
        return redirect()->route('meat.index')->with('success', 'Вид мяса добавлен');
    }


    public function edit($id)
    {
        $meat = Meat::find($id);
        return view('Admin.meat.edit', compact('meat'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'svg_meat' => 'required|image|mimes:svg',

        ]);

        $meat = Meat::find($id);
        $data = $request->all();

        $data['svg_meat'] = Meat::uploadImage($request);

        $meat->update($data);

        return redirect()->route('meats.index')->with('success', 'Изменения сохранены');
    }


    public function destroy($id)
    {
        Meat::destroy($id);
        return redirect()->route('meats.index')->with('success', 'Вид мяса удалён');
    }
}
