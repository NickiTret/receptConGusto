@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Создание фичи</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('features.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название поста</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" placeholder="Название">
                    </div>

                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="10" placeholder="Контент"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image"
                                       class="custom-file-input">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
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
