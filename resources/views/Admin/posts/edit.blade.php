@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование поста</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror" id="title"
                               value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea name="description" class="redactor form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ $post->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" class="redactor2 form-control @error('content') is-invalid @enderror" id="content" rows="7">{{ $post->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                            @foreach($categories as $k => $v)
                                <option value="{{ $k }}" @if($k == $post->category_id) selected @endif>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Теги</label>
                        <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                data-placeholder="Выбор тегов" style="width: 100%;">
                            @foreach($tags as $k => $v)
                                <option value="{{ $k }}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="{{ $post->getImage() }}" name="thumbnail" id="thumbnail"
                                       class="custom-file-input">
                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                            </div>
                        </div>
                        <div><img loading="lazy" src="{{ $post->getImage() }}" alt="" class="img-thumbnail mt-2" width="200"></div>
                    </div>
                    <div class="form-group">
                        <label for="video">Видео код вк</label>
                        <input name="video" type="text" value="{{ $post->video }}" class=" form-control @error('video') is-invalid @enderror" id="video" rows="7">
                    </div>

                    <div class="form-group">
                        <label for="show">Индексация</label>
                        <select name="show" id="show" class="form-control">
                            <option value="0">Нет</option>
                            <option selected value="1">Да</option>
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
