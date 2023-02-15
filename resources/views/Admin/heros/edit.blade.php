@extends('Admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Редактирование записи</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('heros.update', ['hero' => $hero->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror" id="title"
                               value="{{ $hero->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ $hero->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="link">Ссылка</label>
                        <input name="link" class="form-control @error('link') is-invalid @enderror" id="link" rows="7" value="{{ $hero->content }}">  
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
                        <div><img src="{{ $hero->getImage() }}" alt="" class="img-thumbnail mt-2" width="200"></div>
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
