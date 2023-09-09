<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">

    @include('Main.header')
    <div class="site-container" style="overflow: hidden">
        <main>
            @if (!empty($heros))
                @include('Component.first__screen', [
                    'heros' => $heros,
                    'maps' => $maps,
                    'lastPost' => $lastPost,
                ])
            @endif

            <section class="recept single">
                <div class="container full-content">
                    <div class="content">
                        <h2>Кулинарный сайт <span style="white-space: nowrap">Con Gusto</span></h2>
                        <br>
                        <img src="{{ asset('content/сало.jpg') }}" alt="Рецепт домашнего сало из свиной грудинки">
                        <small><a href="/recept/domashnee-salo/">Домашнее сало из свиной грудинки</a></small>
                        <br>
                        <p>Добро пожаловать на сайт “e-con-gusto.ru”, где собраны лучшие и проверенные временем
                            кулинарные рецепты со всего мира. Здесь вы найдете подробные инструкции по приготовлению
                            блюд, качественные фотографии, а также полезные советы и рекомендации.</p>
                        <p><a href="">Кулинарные статьи:</a> Про разные кухни мира, про лечебные диеты,
                            консервацию, вакуумирования и
                            приготовлению в сювиде и т.д.</p>
                        <img src="{{ asset('content/шашл.jpg') }}" alt="Шашлыки из свиной шеи">
                        <small><a href="/category/gril/">Шашлык из свиной шеи</a></small>
                        <br>
                        <p>Кулинарные советы: Мы предлагаем полезные советы по выбору ингредиентов, их сочетанию, а
                            также по технике приготовления блюд. Благодаря этим советам, вы сможете создавать настоящие
                            кулинарные шедевры с первого раза.</p>
                        <p>Выбор классических рецептов: Вы можете найти рецепты блюд, из разных стран и культур. Мы
                            постоянно обновляем и добавляем новые рецепты, чтобы удовлетворить самые разнообразные
                            вкусовые предпочтения.</p>
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
                    </div>
                    <section class="aside">
                        <aside>
                            <h2>Популярные статьи</h2>
                            <ul>
                                @foreach ($news as $post)
                                    @if ($loop->iteration > 3)
                                    @break
                                @endif
                                <li>
                                    <a href="{{ route('new', $post->slug) }}">
                                        <picture>
                                            @if ($post->addImageFormat())
                                                {{-- <source type="image/avif" srcset="/{{ $post->addImageFormat()['imageAvif'] }}" /> --}}
                                                <source type="image/webp"
                                                    srcset="/{{ $post->addImageFormat()['imageWebp'] }}" />
                                            @endif
                                            <img width="314" height="200" loading="lazy"
                                                title="{{ $post->title }}" alt="{{ $post->title }}"
                                                src="/{{ $post->addImageFormat()['imageDefault'] }}">
                                        </picture>
                                        <h3>{{ $post->title }}</h3>
                                    </a>
                                </li>
                            @endforeach
                            @env('local')
                            <li>
                                <!-- Yandex.RTB R-A-2349463-12 -->
                                <div id="yandex_rtb_R-A-2349463-12"></div>
                                <script>
                                    window.yaContextCb.push(() => {
                                        Ya.Context.AdvManager.render({
                                            "blockId": "R-A-2349463-12",
                                            "renderTo": "yandex_rtb_R-A-2349463-12"
                                        })
                                    })
                                </script>
                            </li>
                            @endenv
                        </ul>
                    </aside>
                </section>

            </div>
        </section>

        @if (!empty($posts))
            <section class="pt-none">
                <div class="container">
                    <h2> Популярные рецепты </h2>
                </div>
            </section>
            @include('Component.hits', ['posts' => $posts])
        @endif

    </main>
    @include('Main.footer')
</div>
</body>

</html>
