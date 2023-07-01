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


            @env('local')
            <section class="links">
                <div class="container">
                    <!-- Yandex.RTB R-A-2349463-2 -->
                    <script>
                        window.yaContextCb.push(() => {
                            Ya.Context.AdvManager.render({
                                "blockId": "R-A-2349463-2",
                                "type": "floorAd"
                            })
                        })
                    </script>
                </div>
            </section>
            @endenv

            @if ($fasts)
            @include('Component.simple', ['fasts' => $fasts])
            @endif

        </main>
        @include('Main.footer')
    </div>
</body>

</html>
