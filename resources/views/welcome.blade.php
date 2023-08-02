<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">

    @include('Main.header')
    <div class="site-container" style="overflow: hidden">
        <main>
            @if (!empty($heros))
                @include('Component.first__screen', [
                    'heros' => $heros,
                    'maps' => $maps,
                    'lastPost' => $lastPost,
                ])
            @endif

            @if (!empty($posts))
                <section>
                    <div class="container">
                        <h2> Популярные рецепты </h2>
                    </div>
                </section>
                @include('Component.hits', ['posts' => $posts])
            @endif

        </main>
        @include('Main.footer')
    </div>
</body>

</html>
