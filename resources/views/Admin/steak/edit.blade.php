
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
                <h3 class="card-title">Редактирование " {{ $steak->title }} "</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{  route('steak.update', ['steak' => $steak->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Text</label>
                        <input type="text" name="title" class="form-control @error('title' ) is-invalid @enderror" id="title" value="{{ $steak->title }}" >
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" name="description" class="form-control @error('description' ) is-invalid @enderror" id="description" value="{{ $steak->description }}" >
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" class="redactor2 form-control @error('content') is-invalid @enderror" id="content" rows="7">{{ $steak->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="steaks_id">Выбор отруба для стейка</label>
                        <select class="form-control @error('steaks_id') is-invalid @enderror" id="steaks_id" name="steaks_id">

                            @foreach($pieces as $k => $v)
                                <option value="{{ $k }}" @if($k == $steak->steaks_id) selected @endif>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="{{ $steak->getImage() }}" name="image" id="image"
                                       class="custom-file-input">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div><img loading="lazy" src="{{ $steak->getImage() }}" alt="" class="img-thumbnail mt-2" width="200"></div>
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
