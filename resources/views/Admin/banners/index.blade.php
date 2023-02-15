
@extends('Admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Быстрый рецепт</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive" >
                    <a href="{{ route('banners.create')  }}" class="btn btn-primary mb-3" >Добавить Быстрый рецепт</a>
                    @if (count($banners))

                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Наименование</th>
                            <th>Страница</th>
                            <th>Дата создания</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td>{{  $banner->id }}</td>
                            <td>{{  $banner->title }}</td>
                            <td>{{  $banner->page }}</td>
                            <td>{{  $banner->created_at }}</td>
                            <td>
                                <a href="{{  route('banners.edit', ['banner' => $banner->id]) }}" class="btn btn-info btn-sm float-left mb-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{  route('banners.destroy', ['banner' => $banner->id]) }}" method="post" class="float-left" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm(Подтвердить удаление)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                        @else
                        <p>Записей пока нет...</p>
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
