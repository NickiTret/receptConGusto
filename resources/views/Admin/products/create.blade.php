
@extends('Admin.layouts.layout')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить новый продукт</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">


                <!-- Форма для создания продукта -->
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="product_name">Название продукта</label>
                        <input type="text" name="product_name" class="form-control" id="product_name" required>
                    </div>

                    <div class="form-group">
                        <label for="calories">Калории</label>
                        <input type="number" name="calories" class="form-control" id="calories" required>
                    </div>

                    <div class="form-group">
                        <label for="proteins">Белки (г)</label>
                        <input type="number" name="proteins" class="form-control" id="proteins" required>
                    </div>

                    <div class="form-group">
                        <label for="fats">Жиры (г)</label>
                        <input type="number" name="fats" class="form-control" id="fats" required>
                    </div>

                    <div class="form-group">
                        <label for="carbohydrates">Углеводы (г)</label>
                        <input type="number" name="carbohydrates" class="form-control" id="carbohydrates" required>
                    </div>

                    <div class="form-group">
                        <label for="potassium">Калий (мг)</label>
                        <input type="number" name="potassium" class="form-control" id="potassium">
                    </div>

                    <div class="form-group">
                        <label for="phosphorus">Фосфор (мг)</label>
                        <input type="number" name="phosphorus" class="form-control" id="phosphorus">
                    </div>

                    <div class="form-group">
                        <label for="sodium">Натрий (мг)</label>
                        <input type="number" name="sodium" class="form-control" id="sodium">
                    </div>

                    <div class="form-group">
                        <label for="magnesium">Магний (мг)</label>
                        <input type="number" name="magnesium" class="form-control" id="magnesium">
                    </div>

                    <div class="form-group">
                        <label for="group_id">Группа продуктов</label>
                        <select name="group_id" class="form-control" id="group_id" required>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Создать продукт</button>
                    </div>
                </form>



            </div>
        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
