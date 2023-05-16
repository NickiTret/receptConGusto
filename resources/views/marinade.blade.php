<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container" style="overflow: hidden">
        <main>
            <section class="marinade">
                <div class="container">
                    <h1>Маринады по группам</h1>
                </div>
            </section>
            @include('Component.slider')
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
