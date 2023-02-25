<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header', ['headers' => $headers])
    <div class="site-container">
        <main>
            @if ($banner)
                @include('Component.banner', ['data' => $banner])
            @endif

            @if ($categories)
                @include('Component.categories', ['data' => $categories])
            @endif

            @if ($fasts)
                @include('Component.simple', ['fasts' => $fasts])
            @endif

        </main>
        @include('Main.footer', ['headers' => $headers])
    </div>
</body>

</html>
