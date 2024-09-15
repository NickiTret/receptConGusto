<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head', ['data' => $tag])

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            @if (!empty($hat))
                @include('Component.hat', ['data' => $hat])
            @endif
            @if (!empty($banner))
                @include('Component.banner', ['data' => $banner])
            @elseif(!empty($category_item))
                @include('Component.banner', ['category' => $category_item])
            @endif
            @if (!empty($posts))
                @include('Component.hits', ['posts' => $posts, 'maps' => $maps])
            @endif
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
