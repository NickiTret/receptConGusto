@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование быстрого рецепта</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('hat.update', ['hat' => $hat->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ $hat->title }}">
                    </div>


                    <div class="form-group">
                        <label for="page_name">Страница</label>
                        <select class="form-control @error('page_name') is-invalid @enderror" id="page_name" name="page_name">
                            @foreach($pages as $k => $v)
                                <option value="{{ $k->title }}" @if($k == $hat->page_name) selected @endif>{{ $v->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="7">{{ $hat->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div><img src="{{ $hat->getImage() }}" alt="" class="img-image mt-2" width="200"></div>
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
