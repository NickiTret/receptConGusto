
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
                    <h3 class="card-title">Добавить кусок для мяса</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{  route('piece.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Наименование</label>
                            <input type="text" name="title" class="form-control @error('title' ) is-invalid @enderror" id="title" placeholder="Название" >
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" name="description" class="form-control @error('description' ) is-invalid @enderror" id="description" placeholder="Название" >
                        </div>
                        <div class="form-group">
                            <label for="piece_id">Выбор для куска вид мяса</label>
                            <select name="piece_id" id="piece_id" class="form-control">
                                @foreach ($meats as $k => $v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
