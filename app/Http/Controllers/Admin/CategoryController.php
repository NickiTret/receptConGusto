<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);

        return view('Admin.categories.index', compact('categories'));
    }


    public function create()
    {

        return view('Admin.categories.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            

        ]);
        
        $data = $request->all();

        $data['image'] = Category::uploadImage($request);

        $category = Category::create($data);


        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }


    public function edit($id)
    {
        $category = Category::find($id);

        return view('Admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            
        ]);


        $category = Category::find($id);
        $data = $request->all();

        $data['image'] = Category::uploadImage($request, $category->image);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }


    public function destroy($id)
    {

        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
