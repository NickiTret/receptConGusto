<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Tag;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heros = Hero::all();
        return view('Admin.heros.index', compact('heros'));
    }


    public function create()
    {
        return view('Admin.heros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'image|mimes:jpg',
        ]);

        $data = $request->all();

        $data['image'] = Hero::uploadImage($request);

        $hero = Hero::create($data);

        return redirect()->route('heros.index')->with('success', 'Запись добавлена');
    }

    public function edit($id)
    {
        $hero = Hero::find($id);
        return view('Admin.heros.edit', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'image|mimes:jpg',
        ]);


        $hero = Hero::find($id);
        $data = $request->all();

        $data['image'] = Hero::uploadImage($request, $hero->image);

        $hero->update($data);

        return redirect()->route('heros.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
       $hero = Hero::find($id);
       Storage::delete($hero->image);
       $hero->delete();
        return redirect()->route('heros.index')->with('success', 'Запись удалена');
    }
}
