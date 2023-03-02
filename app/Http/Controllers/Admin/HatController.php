<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Hat;
use App\Models\Header;
use Illuminate\Http\Request;

class HatController extends Controller
{
    public function index()
    {
        $hats = Hat::all();
        $pages = Header::all();

        return view('Admin.hat.index', compact('hats', 'pages'));
    }

    public function create()
    {
        $hats = Hat::all();
        $pages = Header::all();
        return view('Admin.hat.create', compact('hats', 'pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'page_name' => 'required',
            'image' => 'nullable|image',
            
        ]);

        $data = $request->all();

        $data['image'] = Hat::uploadImage($request);
        $hat = Hat::create($data);

        return redirect()->route('hat.index')->with('success', 'Заголовок добавлен');
    }

    public function edit($id)
    {
        $hat = Hat::find($id);
        $pages = Header::all();
        
        return view('Admin.hat.edit', compact('hat', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'page_name' => 'required',
            'image' => 'nullable|image',
        ]);


        $hat = Hat::find($id);
        $data = $request->all();

        $data['image'] = Hat::uploadImage($request, $hat->image);

        $feat->update($data);

        return redirect()->route('hat.index')->with('success', 'Заголовок сохранен');
    }

    public function destroy($id)
    {
       $feat = Feat::find($id);
       Storage::delete($feat->image);
       $feat->delete();
       return redirect()->route('hat.index')->with('success', 'Заголовок удален');
    }
}
