<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header', ['headers' => $headers])
    <div class="site-container">
        <main>

            @if (!empty($banner))
                @include('Component.banner', ['data' => $banner])
            @endif

            @if (!empty($posts))
                @include('Component.hits', ['posts' => $posts, 'url' => $currentURL])
            @endif
        </main>
        @include('Main.footer', ['headers' => $headers])
    </div>
</body>

</html>
