<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Административная панель</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" target="_blank" class="brand-link">
                <img src=" {{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Админ</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Главная</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('seo.index') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Seo настройки</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Header
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('headers.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список ссылок</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('headers.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Новая ссылка</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Главный экран
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('heros.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список записей</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('heros.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Новая запись</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item has-treeview">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Фичи главный экран
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('features.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список записей</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('features.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Новая запись</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-archive"></i>
                                <p>
                                    Категории
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список категории</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Новая категория</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Теги
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('tags.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список Тегов</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tags.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Новый Тег</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('posts.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Рецепты
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('posts.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список рецептов</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('posts.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Создание рецепта</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('news.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Новости
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('news.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список новостей</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('news.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Создание Новости</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        {{-- <li class="nav-item has-treeview">
                            <a href="{{ route('fasts.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Быстрый рецепт
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('fasts.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список постов</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fasts.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Создание поста</p>
                                    </a>
                                </li>

                            </ul>
                        </li> --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('banners.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Баннер для страницы
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('banners.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список баннеров</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('banners.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Создание баннера</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('hat.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Заголовки
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('hat.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список заголовков</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hat.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Создание заголовок</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Соусы и маринады
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('souses.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Рецепты</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subcats.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Подкатегории</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <p>
                                    Стейки картинки
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('meats.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Вид мяса</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('piece.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Кусок мяса</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('steak.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Стейки</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item has-treeview">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../index.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">

            @include('Component.errors')

            @yield('content')

        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="http://adminlte.io"></a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
        // tinymce.init({
        //     selector: 'textarea',
        //     plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        //     tinycomments_mode: 'embedded',
        //     tinycomments_author: 'Author name',
        //     mergetags_list: [{
        //             value: 'First.Name',
        //             title: 'First Name'
        //         },
        //         {
        //             value: 'Email',
        //             title: 'Email'
        //         },
        //     ]
        // });
    </script>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/admin.js') }}"></script>

    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
        if ($('.redactor')) {
            $('.redactor').summernote()
        }
        if ($('.redactor2')) {
            $('.redactor2').summernote(
                {imageAttributes: {
                    icon: '<i class="note-icon-pencil"/>',
                    figureClass: 'figureClass',
                    figcaptionClass: 'captionClass',
                    captionText: 'Caption Goes Here.',
                    manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
                },
                lang: 'en-US',
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']], ,
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageAttributes']],
                    ],
                },
            }
            )
        }
        $('.nav-sidebar').each(function() {
            let location = window.location.protocol + '//' + window.location.host + window.location.pathname;

            let link = this.href;
            if (link === location) {
                $(this).addClass('active');
                $(this).closest('.has-treeview').addClass('menu-open');
            };
        });
    </script>

</body>

</html>
