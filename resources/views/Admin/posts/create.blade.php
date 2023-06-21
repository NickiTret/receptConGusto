@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Создание поста</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название поста</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание поста</label>
                        <textarea name="description" id="description" class="redactor form-control @error('description') is-invalid @enderror" rows="5" placeholder="Описание"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" id="content" class="redactor2 form-control @error('content') is-invalid @enderror" rows="10" placeholder="Контент"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Категория поста</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Теги</label>
                        <select id="tags" name="tags[]" class="select2" multiple="multiple"
                            data-placeholder="Выбор тегов" style="width: 100%;">
                            @foreach ($tags as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="thumbnail" id="thumbnail"
                                       class="custom-file-input">
                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="video">Код для видео вк</label>
                        <textarea name="video" id="video" class="redactor2 form-control @error('video') is-invalid @enderror" rows="10" placeholder="Код для видео"></textarea>
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
