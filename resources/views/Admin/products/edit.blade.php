@extends('Admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование продукта " {{ $product->title }} "</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="product_name">Название продукта</label>
                        <input type="text" name="product_name" class="form-control" id="product_name"
                            value="{{ $product->product_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="calories">Калории</label>
                        <input type="number" name="calories" class="form-control" id="calories"
                            value="{{ $product->calories }}" required>
                    </div>

                    <div class="form-group">
                        <label for="proteins">Белки (г)</label>
                        <input type="number" name="proteins" class="form-control" id="proteins"
                            value="{{ $product->proteins }}" required>
                    </div>

                    <div class="form-group">
                        <label for="fats">Жиры (г)</label>
                        <input type="number" name="fats" class="form-control" id="fats" value="{{ $product->fats }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="carbohydrates">Углеводы (г)</label>
                        <input type="number" name="carbohydrates" class="form-control" id="carbohydrates"
                            value="{{ $product->carbohydrates }}" required>
                    </div>

                    <div class="form-group">
                        <label for="potassium">Калий (мг)</label>
                        <input type="number" name="potassium" class="form-control" id="potassium"
                            value="{{ $product->potassium }}">
                    </div>

                    <div class="form-group">
                        <label for="phosphorus">Фосфор (мг)</label>
                        <input type="number" name="phosphorus" class="form-control" id="phosphorus"
                            value="{{ $product->phosphorus }}">
                    </div>

                    <div class="form-group">
                        <label for="sodium">Натрий (мг)</label>
                        <input type="number" name="sodium" class="form-control" id="sodium" value="{{ $product->sodium }}">
                    </div>

                    <div class="form-group">
                        <label for="magnesium">Магний (мг)</label>
                        <input type="number" name="magnesium" class="form-control" id="magnesium"
                            value="{{ $product->magnesium }}">
                    </div>

                    <div class="form-group">
                        <label for="group_id">Группа продуктов</label>
                        <select name="group_id" class="form-control" id="group_id" required>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" {{ $product->group_id == $group->id ? 'selected' : '' }}>
                                    {{ $group->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Обновить продукт</button>
                </form>
            </div>
            <!-- Форма для редактирования продукта -->



        </div>






    </section>
    <!-- /.content -->


    <!-- /.content-wrapper -->
@endsection
