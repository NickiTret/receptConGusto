
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
                    <h3 class="card-title">Создание подкатегории</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{  route('subcats.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Наименование</label>
                            <input type="text" name="title" class="form-control @error('title' ) is-invalid @enderror" id="title" placeholder="Название" >
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
