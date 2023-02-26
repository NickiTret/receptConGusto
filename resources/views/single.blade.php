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
            <div class="share">
                <span>+</span>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/yash.khare.982?ref=bookmarks"><i class=" fa fa-facebook "></i>Вконтакте</a></li>
                    <li><a href="https://www.instagram.com/yashkhare_211/"><i class="fa fa-instagram "></i>Telegramm</a></li>
        
                    <li><a href="https://github.com/YashKhare143"><i class="fa fa-github "></i>WatSup</a></li>
                </ul>
            </div>
        </main>
        @include('Main.footer', ['headers' => $headers])
    </div>
</body>

</html>
