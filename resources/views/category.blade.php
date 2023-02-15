<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header', ['headers' => $headers])
    <div class="site-container">
        <main>
            @include('Component.banner', ['data' => $banner])
            @include('Component.categories', ['data' => $categories])
            @include('Component.simple', ['fasts' => $fasts])
        </main>
        @include('Main.footer')
    </div>
</body>

</html>