<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head', ['data' => $category_item])

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            @if (!empty($banner))
                @include('Component.banner', ['data' => $banner])
            @else
                @include('Component.banner', ['category' => $category_item])
            @endif
            @if (!empty($posts))
                @include('Component.hits', ['posts' => $posts])
            @endif
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
