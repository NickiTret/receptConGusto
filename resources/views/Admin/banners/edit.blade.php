@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование Банера</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('banners.update', ['banner' => $banner->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Заголовок Банера</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ $banner->title }}">
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Подзаголовок Банера</label>
                        <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                            id="title" value="{{ $banner->subtitle }}">
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
                        <textarea name="content" class="redactor form-control @error('content') is-invalid @enderror" id="content"
                            rows="3">{{ $banner->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div><img src="{{ $banner->getImage() }}" alt="" class="img-image mt-2" width="200"></div>
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
