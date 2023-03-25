<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
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
        @include('Main.footer')
    </div>
</body>

</html>
