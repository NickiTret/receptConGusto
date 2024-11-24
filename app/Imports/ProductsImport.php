<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductGroup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {

        // Преобразуем числовые значения с запятой в формат с точкой
        $calories = str_replace(',', '.', $row['kaloriinost']);
        $proteins = str_replace(',', '.', $row['belki_g']);
        $fats = str_replace(',', '.', $row['ziry_g']);
        $carbohydrates = str_replace(',', '.', $row['uglevody_g']);
        $potassium = str_replace(',', '.', $row['kalii_mg']);
        $phosphorus = str_replace(',', '.', $row['fosfor_mg']);
        $sodium = str_replace(',', '.', $row['natrii_mg']);
        $magnesium = str_replace(',', '.', $row['magnii_mg']);

        // Получаем или создаем группу продукта
        $group = ProductGroup::firstOrCreate(['name' => $row['gruppa']]);

        // Создаем продукт и связываем его с соответствующей группой
        return new Product([
            'product_name'   => $row['produkt_100_gr'],  // Название продукта
            'calories'       => (float)  $calories,               // Калорийность
            'proteins'       => (float) $proteins,               // Белки
            'fats'           => (float) $fats,                   // Жиры
            'carbohydrates'  => (float) $carbohydrates,          // Углеводы
            'potassium'      => (float)  $potassium,              // Калий
            'phosphorus'     => (float)  $phosphorus,             // Фосфор
            'sodium'         => (float)  $sodium,                 // Натрий
            'magnesium'      => (float)  $magnesium,              // Магний
            'group_id'       => $group->id,              // Привязываем продукт к группе
        ]);
    }
}
