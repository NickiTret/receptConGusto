@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('souses.update', ['souse' => $sous->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ $sous->title }}">
                    </div>

                    <div class="form-group">
                        <label for="marinade">Маринад?</label>
                        <select name="marinade" id="marinade" class="form-control">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea name="description" class="redactor form-control @error('description') is-invalid @enderror" id="description"
                            rows="3">{{ $sous->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea name="content" class="redactor2 form-control @error('content') is-invalid @enderror" id="content" rows="7">{{ $sous->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div><img loading="lazy" src="{{ $sous->getImage() }}" alt="" class="img-image mt-2" width="200"></div>
                    </div>
                <!-- /.card-body -->
                <div class="form-group">
                    <label for="link">Название</label>
                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror"
                        id="link" value="{{ $sous->link }}">
                </div>
                <div class="form-group">
                    <label for="sub_category_id">Подкатегория</label>
                    <select class="form-control @error('sub_category_id') is-invalid @enderror" id="sub_category_id" name="sub_category_id">
                        @foreach($sub_categories as $k => $v)
                            <option value="{{ $v->id }}" @if($v->id == $sous->sub_category_id) selected @endif>{{ $v->title }}</option>
                        @endforeach
                    </select>
                </div>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->


    <!-- /.content-wrapper -->
@endsection
