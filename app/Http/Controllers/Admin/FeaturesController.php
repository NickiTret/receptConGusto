<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Feat;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index()
    {
        $features = Feat::all();

        return view('Admin.features.index', compact('features'));
    }

    public function create()
    {
        $features = Feat::all();
        return view('Admin.features.create', compact('features'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            
        ]);

        $data = $request->all();

        $data['image'] = Feat::uploadImage($request);
        $feat = Feat::create($data);

        return redirect()->route('features.index')->with('success', 'Фича добавлена');
    }

    public function edit($id)
    {
        $feat = Feat::find($id);
        
        return view('Admin.features.edit', compact('feat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image',
        ]);


        $feat = Feat::find($id);
        $data = $request->all();

        $data['image'] = Feat::uploadImage($request, $feat->image);

        $feat->update($data);

        return redirect()->route('features.index')->with('success', 'Фича сохранена');
    }

    public function destroy($id)
    {
       $feat = Feat::find($id);
       Storage::delete($feat->image);
       $feat->delete();
       return redirect()->route('features.index')->with('success', 'Фича удалена');
    }
}
