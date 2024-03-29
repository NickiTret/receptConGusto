@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Создание Банера для страницы</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Заголовок Банера</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Подзаголовок Банера</label>
                        <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                            id="subtitle" placeholder="Название">
                    </div>

                    <div class="form-group">
                        <label for="page">Страница</label>
                        <select name="page" id="page" class="form-control">
                            @foreach ($pages as $page)
                            <option value="{{$page->title}}">{{$page->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Цитата</label>
                        <textarea name="content" id="content" class="redactor form-control @error('content') is-invalid @enderror" rows="5" placeholder="Описание"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="btn_name">Название кнопки</label>
                        <input type="text" name="btn_name" class="form-control @error('btn_name') is-invalid @enderror"
                            id="btn_name" placeholder="Название кнопки">
                    </div>


                    <div class="form-group">
                        <label for="btn_link">Ссылка кнопки</label>
                        <input type="text" name="btn_link" class="form-control @error('btn_link') is-invalid @enderror"
                            id="btn_link" placeholder="Название">
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
