<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            @if (!empty($heros))
                @include('Component.first__screen', ['heros' => $heros])
            @endif

            @if (!empty($features))
                @include('Component.features', ['data' => $features])
            @endif

            @if (!empty($fasts))
                @include('Component.simple', ['fasts' => $fasts])
            @endif

            @if (!empty($random))
                @include('Component.recept__day', ['random' => $random])
            @endif

            @if (!empty($posts))
            <section>
                <div class="container">
                    <h2> Лучшие рецепты </h2>
                </div>
            </section>
                @include('Component.hits', ['posts' => $posts, 'url' => $currentURL])
            @endif
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
