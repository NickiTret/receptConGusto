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
                    <!-- Yandex.RTB R-A-2349463-15 -->
                    <div id="yandex_rtb_R-A-2349463-15"></div>
                    <script>
                        window.yaContextCb.push(() => {
                            Ya.Context.AdvManager.render({
                                "blockId": "R-A-2349463-15",
                                "renderTo": "yandex_rtb_R-A-2349463-15"
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
