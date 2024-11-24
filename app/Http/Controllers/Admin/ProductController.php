<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ProductController extends Controller
{

    // public function importshow()
    // {
    //     // Логика для отображения списка продуктов
    //     return view('Admin.products.import');
    // }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Данные успешно импортированы!');
    }

    // Список всех продуктов
    public function index()
    {
        $products = Product::with('group')->orderBy('product_name')->paginate(20); // Пагинация
        return view('admin.products.index', compact('products'));
    }

    // Показ формы для создания продукта
    public function create()
    {
        $groups = ProductGroup::all(); // Для выбора группы продукта
        return view('admin.products.create', compact('groups'));
    }

    // Сохранение нового продукта
    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'product_name'   => 'required|string|max:255',
            'calories'       => 'required|numeric',
            'proteins'       => 'required|numeric',
            'fats'           => 'required|numeric',
            'carbohydrates'  => 'required|numeric',
            'potassium'      => 'nullable|numeric',
            'phosphorus'     => 'nullable|numeric',
            'sodium'         => 'nullable|numeric',
            'magnesium'      => 'nullable|numeric',
            'group_id'       => 'required|exists:product_groups,id',
        ]);

        // Создаем продукт
        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Продукт успешно создан.');
    }

    // Показ конкретного продукта
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    // Показ формы для редактирования продукта
    public function edit(Product $product)
    {
        $groups = ProductGroup::all();
        return view('admin.products.edit', compact('product', 'groups'));
    }

    // Обновление данных продукта
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name'   => 'required|string|max:255',
            'calories'       => 'required|numeric',
            'proteins'       => 'required|numeric',
            'fats'           => 'required|numeric',
            'carbohydrates'  => 'required|numeric',
            'potassium'      => 'nullable|numeric',
            'phosphorus'     => 'nullable|numeric',
            'sodium'         => 'nullable|numeric',
            'magnesium'      => 'nullable|numeric',
            'group_id'       => 'required|exists:product_groups,id',
        ]);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Продукт успешно обновлен.');
    }

    // Удаление продукта
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Продукт успешно удален.');
    }

}
