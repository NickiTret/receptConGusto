<?php

use App\Models\Header;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;

$headers = Header::all();
$categories_menu = Category::orderBy('title')->get();
$hasAcceptedCookies = Cookie::get('acceptCookie', false);

?>

<!DOCTYPE html>
<html lang="ru" class="page">
@include('Main.head')

<body class="page__body">
    @include('Main.header', ['headers' => $headers])
    <div class="site-container error-page">
        <main>
            <div class="container">
                {{-- <div class="circle"></div> --}}
                <h1>404</h1>
                {{-- <h2>Страница не найдена</h2> --}}
                <h3>Страница не существует или не найдена попробуйте поискать в другом разделе</h3>
                <div>
                    <a href="/">Главная страница</a>
                </div>

            </div>
        </main>

    </div>
    @include('Main.footer')
    {{-- <script type="module" src="{{ asset('assets/js/main.js') }}"></script> --}}
</body>

</html>
