@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование страницы</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('seo.update', ['seo' => $page->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_page">Название страницы</label>
                        <input type="text" name="name_page"
                               class="form-control @error('name_page') is-invalid @enderror" id="name_page"
                               value="{{ $page->name_page }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Заголовок страницы</label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror" id="title"
                               value="{{ $page->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Описание страницы</label>
                        <textarea name="description" class="redactor form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ $page->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Мета теги (код, необязательно)</label>
                        <textarea name="meta_tags" class="redactor2 form-control @error('meta_tags') is-invalid @enderror" id="meta_tags" rows="7">{{ $page->meta_tags }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="keywords">Ключевые слова(необязательно)</label>
                        <input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror"
                        value="{{ $page->keywords }}"
                            id="keywords" placeholder="Ключевые слова">
                    </div>

                    <div class="form-group">
                        <label for="image_page">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="{{ $page->getImage() }}" name="image_page" id="image_page"
                                       class="custom-file-input">
                                <label class="custom-file-label" for="image_page">Choose file</label>
                            </div>
                        </div>
                        <div><img loading="lazy" src="{{ $page->getImage() }}" alt="" class="img-thumbnail mt-2" width="200"></div>
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
