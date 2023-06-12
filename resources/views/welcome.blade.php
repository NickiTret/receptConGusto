<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    <!--LiveInternet counter-->
    <script>
        (function(d, s) {
            d.getElementById("licnt59E3").src =
                "https://counter.yadro.ru/hit?t45.9;r" + escape(d.referrer) +
                ((typeof(s) == "undefined") ? "" : ";s" + s.width + "*" + s.height + "*" +
                    (s.colorDepth ? s.colorDepth : s.pixelDepth)) + ";u" + escape(d.URL) +
                ";h" + escape(d.title.substring(0, 150)) + ";" + Math.random()
        })
        (document, screen)
    </script>
    <!--/LiveInternet-->
    @include('Main.header')
    <div class="site-container" style="overflow: hidden">
        <main>
            @if (!empty($heros))
                @include('Component.first__screen', [
                    'heros' => $heros,
                    'maps' => $maps,
                    'fasts' => $fasts,
                    'lastPost' => $lastPost,
                    'allPosts' => $allPosts,
                ])
            @endif

            @if (!empty($fasts))
                @include('Component.simple', ['fasts' => $fasts])
            @endif

            @if (!empty($posts))
                <section>
                    <div class="container">
                        <h2> Популярные рецепты </h2>
                    </div>
                </section>
                @include('Component.hits', ['posts' => $posts, 'url' => $currentURL])
            @endif

            {{-- @if (!empty($features))
                @include('Component.features', ['data' => $features])
            @endif --}}

            @if (!empty($random))
                @include('Component.recept__day', ['random' => $random])
            @endif
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
