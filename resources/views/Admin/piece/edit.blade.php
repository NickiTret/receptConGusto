
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
                <h3 class="card-title">Редактирование " {{ $piece->title }} "</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{  route('piece.update', ['piece' => $piece->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Text</label>
                        <input type="text" name="title" class="form-control @error('title' ) is-invalid @enderror" id="title" value="{{ $piece->title }}" >
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" name="description" class="form-control @error('description' ) is-invalid @enderror" id="description" value="{{ $piece->description }}" >
                    </div>
                    <div class="form-group">
                        <label for="piece_id">Выбор для куска вид мяса</label>
                        <select class="form-control @error('piece_id') is-invalid @enderror" id="piece_id" name="piece_id">
                            @foreach($meats as $k => $v)
                                <option value="{{ $k }}" @if($k == $piece->piece_id) selected @endif>{{ $v }}</option>
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
