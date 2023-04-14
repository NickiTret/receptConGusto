
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
                <h3 class="card-title">Редактирование категории " {{ $category->title }} "</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{  route('categories.update', ['category' => $category->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Text</label>
                        <input type="text" name="title" class="form-control @error('title' ) is-invalid @enderror" id="title" value="{{ $category->title }}" >
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" name="description" class="form-control @error('description' ) is-invalid @enderror" id="description" value="{{ $category->description }}" >
                    </div>
                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div><img src="{{ $category->getImage() }}" alt="" class="img-image mt-2" width="200"></div>
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
