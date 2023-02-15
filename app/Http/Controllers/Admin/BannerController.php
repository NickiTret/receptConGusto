<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Header;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $pages = Header::all();
        return view('Admin.banners.index', compact('banners', 'pages'));
    }

    public function create()
    {
        $banners = Banner::all();
        $pages = Header::all();
        return view('Admin.banners.create', compact('banners', 'pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'page' => 'required',
            'image' => 'nullable|image',
            
        ]);

        $data = $request->all();

        $data['image'] = Banner::uploadImage($request);

        $banner = Banner::create($data);

        return redirect()->route('banners.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        $pages = Header::all();
        return view('Admin.banners.edit', compact('banner', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'page' => 'required',
            'image' => 'nullable|image',
        ]);

        $banner = Banner::find($id);
        $data = $request->all();

        $data['image'] = Banner::uploadImage($request, $banner->image);

        $banner->update($data);


        return redirect()->route('banners.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
       $banner = Banner::find($id);
       Storage::delete($banner->image);
       $banner->delete();
       return redirect()->route('banners.index')->with('success', 'Статья удалена');
    }
}
