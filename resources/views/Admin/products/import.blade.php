@extends('Admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Главная</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-2">
                    <h1>Импорт продуктов</h1>

                    @if(session('success'))
                        <div style="color: green;">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="file">Выберите файл Excel:</label>
                        <input type="file" name="file" id="file" required>
                        <button type="submit">Импортировать</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
