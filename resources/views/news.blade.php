<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            @if (!empty($news))
                <section class="hits">
                    <div class="container">
                        <div class="hits-top">
                            <h1> Статьи </h1>
                            <div class="viewsort-btns">
                                <button type="button" class="viewsort-btn" data-sort="grid">
                                    Сетка
                                </button>
                                <button type="button" class="viewsort-btn" data-sort="row">
                                    В строку
                                </button>
                            </div>
                        </div>

                        <ul class="hits-news grid-sort">
                            @foreach ($news as $post)
                                <li>
                                    <a href="{{ route('new', $post->slug) }}">
                                        {{-- @if (!empty($post->thumbnail))
                                            <img src="/{{ $post->thumbnail }}" alt="{{ $post->title }}">
                                        @else
                                            <img src="/{{ $post->image }}" alt="{{ $post->title }}">
                                        @endif --}}
                                        <picture>
                                            @if ($post->addImageFormat())
                                                {{-- <source type="image/avif" srcset="/{{ $post->addImageFormat()['imageAvif'] }}" /> --}}
                                                <source type="image/webp" srcset="/{{ $post->addImageFormat()['imageWebp'] }}" />
                                            @endif
                                            <img  width="314" height="200" loading="lazy" title="{{ $post->title }}" alt="{{ $post->title }}"
                                                src="/{{ $post->addImageFormat()['imageDefault'] }}">
                                        </picture>
                                        <div class="description">
                                            <div class="top">
                                                @if ($post->restorant)
                                                    <span class="category">
                                                        Посещение ресторана
                                                    </span>
                                                @endif
                                            </div>
                                            <h3>{{ $post->title }}</h3>
                                            <div class="scroll">{!! $post->description !!}</div>
                                            <ul class="post-description">
                                                <li>Дата написания: <span>{{ $post->created_at->format('d.m.Y') }}</span>
                                                </li>
                                                <li>Просмотры: <span>{{ $post->views }}</span> </li>
                                            </ul>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            @endif

        </main>
        @include('Main.footer')
    </div>
</body>

</html>
