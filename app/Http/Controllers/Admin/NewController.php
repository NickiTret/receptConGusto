<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('Admin.news.index', compact('news'));
    }

    public function create()
    {
        $news = News::all();
        return view('Admin.news.create', compact('news'));
    }

    public function store(Request $request)
    {
        Cache::flush();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'restorant' => 'required',
            'image' => 'image|mimes:jpg',
            'alt_img' => 'nullable|image',
            'show' => 'required'

        ]);

        $data = $request->all();

        $data['image'] = News::uploadImage($request);

        $new = News::create($data);

        exec('npm run imagemin');
        return redirect()->route('news.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        $new = News::find($id);

        return view('Admin.news.edit', compact('new'));
    }

    public function update(Request $request, $id)
    {
        Cache::flush();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'restorant' => 'required',
            'image' => 'image|mimes:jpg',
            'alt_img' => 'nullable|image',
            'show' => 'required'
        ]);

        $new = News::find($id);
        $data = $request->all();

        $data['image'] = News::uploadImage($request, $new->image);

        $new->update($data);

//        $new->update($request->all());

        exec('npm run imagemin');
        return redirect()->route('news.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
       $new = News::find($id);
       Storage::delete($new->image);
       $new->delete();
       return redirect()->route('news.index')->with('success', 'Статья удалена');
    }
}
