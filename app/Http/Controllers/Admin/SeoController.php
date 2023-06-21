<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{

    public function index()
    {
        $pages = Seo::all();
        return view('Admin.seo.index', compact('pages'));
    }


    public function create()
    {
        return view('Admin.seo.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'meta_tags' => 'nullable',
            'keywords' => 'nullable',
            'name_page' => 'required',
            'image_page' => 'nullable|image'
        ]);

        $data = $request->all();

        $data['image_page'] = Seo::uploadImage($request);

        $page = Seo::create($data);
        return redirect()->route('seo.index')->with('success', 'Настройки добавлены');
    }


    public function edit($id)
    {
        $page = Seo::find($id);
        return view('Admin.seo.edit', compact('page'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'meta_tags' => 'nullable',
            'keywords' => 'nullable',
            'name_page' => 'required',
            'image_page' => 'nullable|image'
        ]);

        $page = Seo::find($id);
        $data = $request->all();

        $data['image_page'] = Seo::uploadImage($request, $page->image_page);

        $page->update($data);

        return redirect()->route('seo.index')->with('success', 'Изменения сохранены');
    }


    public function destroy($id)
    {
        Seo::destroy($id);
        return redirect()->route('seo.index')->with('success', 'Настрйоки удалены');
    }
}
