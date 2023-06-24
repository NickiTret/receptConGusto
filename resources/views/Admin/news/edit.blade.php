@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование новости</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('news.update', ['news' => $new->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ $new->title }}">
                    </div>

                    <div class="form-group">
                        <label for="restorant">Ресторан?</label>
                        <select name="restorant" id="restorant" class="form-control">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea name="description" class="redactor form-control @error('description') is-invalid @enderror" id="description"
                            rows="3">{{ $new->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" class="redactor2 form-control @error('content') is-invalid @enderror" id="content" rows="7">{{ $new->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div><img loading="lazy" src="{{ $new->getImage() }}" alt="" class="img-image mt-2" width="200"></div>
                    </div>

                    <div class="form-group">
                        <label for="show">Индексация</label>
                        <select name="show" id="show" class="form-control">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
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
