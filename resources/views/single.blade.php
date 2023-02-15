<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header', ['headers' => $headers])
    <div class="site-container">
        <main>
            @if (!empty($post))
                @include('Component.news', ['data' => $post])
                <section class="recept">
                    <div class="container full-content">
                        <div class="content">
                            {!! $post->content !!}
                        </div>
                        @include('Component.aside', ['post' => $post])
                    </div>
                    <div class="container">
                        <div @if (!empty($post->thumbnail)) style="background-image: url(../{{ $post->thumbnail }});"
                    @else
                    style="background-image: url(../{{ $post->image }});" @endif
                            class="title-img">
                            <p>{!! $post->description !!}</p>
                        </div>
                        <ul class="content-set">
                            @if (!empty($post->views))
                                <li>Просмотров: <span>{{ $post->views }}</span> </li>
                            @endif


                            <li>Создание: <span>{{ $post->created_at->format('d F, Y год. Время: H:i') }}</span> </li>
                            @if (!empty($categories))
                                <li>Категория: <span>
                                        @foreach ($categories as $item)
                                            {{ $item }}
                                        @endforeach
                                    </span> </li>
                            @endif

                            @if (!empty($tags))
                                <li>Теги:
                                    <ul>
                                        @foreach ($tags as $tag)
                                            <li>{{ $tag }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif

                        </ul>
                    </div>
                </section>
            @endif
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
