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
                        <h1> Статьи </h1>
                        <ul class="hits-news">
                            @foreach ($news as $post)
                                <li data-aos="flip-left" data-aos-duration="300" data-aos-delay="{{ $post->id * 50 }}">
                                    <a href="{{ route('new', $post->slug) }}">
                                        @if (!empty($post->thumbnail))
                                            <img src="/{{ $post->thumbnail }}" alt="{{ $post->title }}">
                                        @else
                                            <img src="/{{ $post->image }}" alt="{{ $post->title }}">
                                        @endif
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
            @if (!empty($fasts))
                @include('Component.simple', ['fasts' => $fasts])
            @endif

        </main>
        @include('Main.footer')
    </div>
</body>

</html>
