<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name'); // Название продукта
            $table->float('calories'); // Калорийность
            $table->float('proteins'); // Белки
            $table->float('fats'); // Жиры
            $table->float('carbohydrates'); // Углеводы
            $table->float('potassium'); // Калий
            $table->float('phosphorus'); // Фосфор
            $table->float('sodium'); // Натрий
            $table->float('magnesium'); // Магний
            $table->foreignId('group_id')->constrained('product_groups')->onDelete('cascade'); // Связь с группой
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
