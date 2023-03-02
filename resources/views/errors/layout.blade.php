
<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    {{-- @include('Main.header', ['headers' => $headers]) --}}
    <div class="site-container error-page">
        <main>
            <div class="container">
                <div class="circle"></div>
                <h1>404</h1>
                <h2>Страница не найдена</h2>
                <div>
                    <a href="/">Главная страница</a>
                </div>

            </div>
        </main>
        {{-- @include('Main.footer') --}}
    </div>
    <script type="module" src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>