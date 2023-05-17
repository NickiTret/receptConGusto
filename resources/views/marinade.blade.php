<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container" style="overflow: hidden">
        <main>
            @if ($banner)
            @include('Component.banner', ['data' => $banner])
            @endif
            <section class="marinade">
                <div class="container">
                    <h1>Коллекция маринадов</h1>
                </div>
            </section>
            @include('Component.slider')
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
