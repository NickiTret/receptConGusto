<!DOCTYPE html>
<html lang="ru" class="page">
@include('Main.head', ['data' => $post])

{{-- {{dd($post->addImageFormat()['imageWebp'])}} --}}

<body class="page__body">
    @include('Main.header')
    <script async src="https://ad.mail.ru/static/ads-async.js"></script>
    <ins class="mrg-tag" style="display:inline-block;width:100%;height:50px" data-ad-client="ad-1306627"
        data-ad-slot="1306627"></ins>
    <script>
        (MRGtag = window.MRGtag || []).push({});
    </script>
    <div class="site-container">
        <main>
            @if (!empty($post))
                @include('Component.news', ['data' => $post])
                <section class="recept">
                    <div class="container full-content">
                        <div class="content">
                            @if ($post->video)
                                <div class="video">
                                    <h2>Видеорецепт</h2>
                                    {!! $post->video !!}
                                </div>
                            @endif
                            {!! $post->content !!}
                        </div>
                        @if (!empty($posts))
                            @include('Component.aside', ['posts' => $posts])
                        @endif

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
                            <li>Создание: <span>{{ $post->created_at->format('d.m.Y') }}</span> </li>
                            @if (!empty($post->category_id))
                                <li>Категория: <span>

                                        {{ $category->title }}

                                    </span> </li>
                            @endif
                            @if (!empty($post->tags))
                                <li>Теги:
                                    <ul>
                                        @foreach ($post->tags as $tag)
                                            <li> <a
                                                    href="{{ route('tags.single', ['id' => $tag->id]) }}">{{ $tag->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </section>
            @endif
            @if (!empty($posts))
                <section>
                    <div class="container">
                        <h2> Может быть интересно: </h2>
                    </div>
                </section>
                @include('Component.hits', ['posts' => $posts, 'url' => $currentURL])
            @endif
            <div class="share">
                <span>
                    <svg data-name="Livello 1" id="Livello_1" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                        <title />
                        <path
                            d="M105,82a23,23,0,0,0-22.49,18.17L41.74,77.29a23,23,0,0,0,0-26.57L82.51,27.83a23,23,0,1,0-.44-6.63l-44.53,25a23,23,0,1,0,0,35.62l44.53,25A23,23,0,1,0,105,82Zm0-76A17,17,0,1,1,88,23,17,17,0,0,1,105,6ZM11,76A17,17,0,0,1,35,52h0A17,17,0,0,1,11,76Zm94,46a17,17,0,1,1,17-17A17,17,0,0,1,105,122Z" />
                    </svg>
                </span>
                <div class="likely">
                    <div class="twitter"></div>
                    <div class="vkontakte"></div>
                    <div class="odnoklassniki"></div>
                    <div class="telegram"></div>
                    <div class="whatsapp"></div>
                </div>
            </div>
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
