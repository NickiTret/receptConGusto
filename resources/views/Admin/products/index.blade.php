
@extends('Admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Продукты</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive" >
                    <a href="{{ route('products.create')  }}" class="btn btn-primary mb-3" >Добавить продукт</a>
                    @if (count($products))

                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Калории</th>
                                <th>Белки</th>
                                <th>Жиры</th>
                                <th>Углеводы</th>
                                <th>Группа</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->calories }}</td>
                                    <td>{{ $product->proteins }}</td>
                                    <td>{{ $product->fats }}</td>
                                    <td>{{ $product->carbohydrates }}</td>
                                    <td>{{ $product->group->name ?? 'Без группы' }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Редактировать</a>

                                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- пагинация  --}}

                    <br>
                    <div class="pagination m-t-1">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>

                        @else
                        <p>Записи пока нет...</p>
                    @endif
                </div>
                <!-- /.card-body -->
{{--                <div class="card-footer clearfix">--}}
{{--                    {{ $categories->links()  }}--}}
{{--                </div>--}}

            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
