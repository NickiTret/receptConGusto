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

            <section class="links">
                <div class="container">
                <!-- Yandex Native Ads C-A-2349463-4 -->
                <div id="yandex_rtb_C-A-2349463-4"></div>
                <script>
                    window.yaContextCb.push(() => {
                        Ya.Context.AdvManager.renderWidget({
                            renderTo: 'yandex_rtb_C-A-2349463-4',
                            blockId: 'C-A-2349463-4'
                        })
                    })
                </script>
                </div>
            </section>

            @if ($fasts)
                @include('Component.simple', ['fasts' => $fasts])
            @endif

        </main>
        @include('Main.footer')
    </div>
</body>

</html>
