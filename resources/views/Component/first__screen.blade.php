<section class="first-screen">
    <div class="slider-hero swiper">
        <ul class="swiper-wrapper">
            @foreach ($heros as $item)
                <li class="swiper-slide">
                    <picture>
                        <img src="/{{ $item->image }}" alt="{{ $item->title }}">
                    </picture>
                    <div class="text text__left">
                        <h1>{{ $item->title }}</h1>
                        {!! $item->description !!}
                        <ul class="text-list">
                            @foreach ($lastPost as $item)
                                <li class="text-list__item">
                                    <a href="{{ route('single', $item->slug) }}">
                                        {{-- @if($item->thumbnail)
                                        <img loading="lazy" src="/{{ $item->thumbnail }}asdsa" alt="{{ $item->title }}">
                                        @endif --}}
                                        <picture>
                                            @if ($item->addImageFormat())
                                                {{-- <source type="image/avif" srcset="/{{ $item->addImageFormat()['imageAvif'] }}" /> --}}
                                                <source type="image/webp" srcset="/{{ $item->addImageFormat()['imageWebp'] }}" />
                                            @endif
                                            <img width="324" height="220" loading="lazy" title="{{ $item->title }}" alt="{{ $item->title }}"
                                                src="/{{ $item->addImageFormat()['imageDefault'] }}">
                                        </picture>

                                        <h3>{{ $item->title }}</h3>
                                        {!! $item->description !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="swiper-pagination"></div>
    </div>
    <aside class="first-screen__aside">
        <h3>Проверенные и&nbsp;классические рецепты</h3>
        <h4>Новые классные рецепты каждую неделю</h4>
        <h4>Рецепты по интересам:</h4>
        <ul class="first-screen__aside-tags">
            @foreach ($maps as $tag)
                @if ($tag->title === 'Христос воскрес')
                    @continue
                @endif
                <li>
                    <a href="{{ route('tags.single', ['id' => $tag->id]) }}">{{ $tag->title }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
</section>
