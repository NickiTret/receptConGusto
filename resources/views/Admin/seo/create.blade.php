@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Создание страницы</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('seo.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название страницы</label>
                        <input type="text" name="name_page" class="form-control @error('name_page') is-invalid @enderror"
                            id="name_page" placeholder="Название страницы">
                    </div>
                    <div class="form-group">
                        <label for="title">Заголовок страницы</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" placeholder="Название">
                    </div>

                    <div class="form-group">
                        <label for="description">Описание страницы</label>
                        <textarea name="description" id="description" class="redactor form-control @error('description') is-invalid @enderror" rows="5" placeholder="Описание"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Мета теги (код, необязательно)</label>
                        <textarea name="meta_tags" id="meta_tags" class="redactor2 form-control @error('meta_tags') is-invalid @enderror" rows="10" placeholder="Мета теги"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="keywords">Ключевые слова(необязательно)</label>
                        <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror"
                            id="keywords" placeholder="Ключевые слова">
                    </div>
                    {{-- <div class="form-group">
                        <label for="category_id">Категория страницы</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach

                        </select>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="tags">Теги</label>
                        <select id="tags" name="tags[]" class="select2" multiple="multiple"
                            data-placeholder="Выбор тегов" style="width: 100%;">
                            @foreach ($tags as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="image_page">Изображение(необязательно)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image_page" id="image_page"
                                       class="custom-file-input">
                                <label class="custom-file-label" for="image_page">Choose file</label>
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
