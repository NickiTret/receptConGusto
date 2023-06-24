<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Fast;
use Illuminate\Http\Request;

class FastController extends Controller
{
    public function index()
    {
        $fasts = Fast::all();
        return view('Admin.fasts.index', compact('fasts'));
    }

    public function create()
    {
        $fasts = Fast::all();
        return view('Admin.fasts.create', compact('fasts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'show' => 'required'

        ]);

        $data = $request->all();

        $data['image'] = Fast::uploadImage($request);

        $category = Fast::create($data);

        return redirect()->route('fasts.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        $fast = Fast::find($id);

        return view('Admin.fasts.edit', compact('fast'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image',
            'show' => 'required'
        ]);

        // $fast = Fast::find($id);
        // $data = $request->all();

        // $data['image'] = Fast::uploadImage($request, $fast->image);

        // $fast->update($data);

        // $fast->update($request->all());





        $fast = Fast::find($id);
        $data = $request->all();

        $data['image'] = Fast::uploadImage($request, $fast->image);

        $fast->update($data);

        return redirect()->route('fasts.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
       $fast = Fast::find($id);
       Storage::delete($fast->image);
       $fast->delete();
       return redirect()->route('fasts.index')->with('success', 'Статья удалена');
    }
}
