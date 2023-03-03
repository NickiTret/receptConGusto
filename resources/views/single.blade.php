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
                        @if(!empty($posts))
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
                            <li>Создание: <span>{{ $post->created_at->format('d F, Y год. Время: H:i') }}</span> </li>
                            @if (!empty($post->category_id))
                                <li>Категория: <span>
                                       
                                            {{ $category->title }}
                                      
                                    </span> </li>
                            @endif
                            @if (!empty($post->tags))
                                <li>Теги:
                                    <ul>
                                        @foreach ($post->tags as $tag)
                                            <li> <a href="{{ route('tags.single', ['id' => $tag->id]) }}">{{ $tag->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </section>
            @endif
            <div class="share">
                <span>+</span>
                <ul>
                    <li><a href="https://vkontakte.ru/share.php?url={{ url()->current() }}"><i class=" fa fa-facebook "></i>Вконтакте</a></li>
                    <li><a href="https://telegram.me/share/url?url={{ url()->current() }}"><i class="fa fa-instagram "></i>Telegramm</a></li>
                </ul>
            </div>
        </main>
        @include('Main.footer', ['headers' => $headers])
    </div>
</body>

</html>
