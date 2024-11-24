<!DOCTYPE html>
<html lang="ru" class="page">
@include('Main.head', ['data' => $post])

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            @if (!empty($post))
                @include('Component.news', ['data' => $post])
                <section class="recept single">
                    <div class="container">
                        <ul class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a href="/" title="Главная" itemprop="item">
                                    <span itemprop="name">Главная</span>
                                    <meta itemprop="position" content="0">
                                </a>
                            </li>
                            @if (isset($post->category))
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a href="{{ route('category_item', $post->category->slug) }}" title="{{ $post->category->title }}" itemprop="item">
                                        <span itemprop="name">{{ $post->category->title }}</span>
                                        <meta itemprop="position" content="1">
                                    </a>
                                </li>
                            @else
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a href="{{ route('news') }}" title="Статьи" itemprop="item">
                                    <span itemprop="name">Статьи</span>
                                    <meta itemprop="position" content="1">
                                </a>

                            </li>
                            @endif
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <span itemprop="name">{{ $post->title }}</span>
                                <meta itemprop="position" content="2">
                            </li>
                        </ul>
                    </div>
                    <div class="container full-content">
                        <div class="content">
                            @if ($post->video)
                                <div class="video">
                                    <h2>Видеорецепт</h2>
                                    {!! $post->video !!}
                                </div>
                            @endif


                            {!! $post->content !!}

                            <p><span style="font-weight: bolder;">Подписывайтесь на нас в соц сетях:</span></p>
                            <ul>

                                <li><a href="https://rutube.ru/channel/32029491/" target="_blank">На RUTUBE канал</a>
                                </li>
                                <li><a href="https://t.me/econgusto" target="_blank">На телеграмм канал</a></li>
                                <li><a href="https://vk.com/public221195230" target="_blank">в VK сообщество</a></li>
                                <li><a href="https://ok.ru/group/70000003459339" target="_blank">в группу
                                        Одноклассники</a>
                                </li>
                            </ul>
                            @if (!isset($post->restorant))
                                @include('Component.comments')
                            @endif

                        </div>

                        @if (!empty($posts))
                            @include('Component.aside', ['posts' => $posts])
                        @endif

                    </div>
                    <div class="container">
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
                                                    href="{{ route('tags.single', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
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
                <section class="clear">
                    <div class="container">
                    <h2> Похожие рецепты и статьи</h2>
                    </div>
                </section>
                @include('Component.hits', ['posts' => $posts, 'post' => $post])
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
                    <div class="pinterest" data-title="{{ $post->title }}" data-media="{{ asset($post->addImageFormat()['imageDefault']) }}"></div>
                </div>
            </div>
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
