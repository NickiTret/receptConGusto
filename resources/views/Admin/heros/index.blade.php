
@extends('Admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Записи главного экрана</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive" >
                    <a href="{{ route('heros.create')  }}" class="btn btn-primary mb-3" >Добавить запись</a>
                    @if (count($heros))

                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Заголовок</th>
                            <th>Описание</th>
                            <th>Ссылка</th>
                            <th>Дата создания</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($heros as $hero)
                        <tr>
                            <td>{{  $hero->id }}</td>
                            <td>{{  $hero->title }}</td>
                            <td>{{  $hero->description }}</td>
                            <td>{{  $hero->link}}</td>
                            <td>{{  $hero->created_at }}</td>
                            <td>
                                <a href="{{  route('heros.edit', ['hero' => $hero->id]) }}" class="btn btn-info btn-sm float-left mb-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{  route('heros.destroy', ['hero' => $hero->id]) }}" method="post" class="float-left" >
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
