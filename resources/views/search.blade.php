<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            @if (!empty($banner))
                @include('Component.banner', ['data' => $banner])
            @endif

            @if (!empty($posts))
                @include('Component.hits', ['posts' => $posts, 'url' => $currentURL])
            @endif
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
