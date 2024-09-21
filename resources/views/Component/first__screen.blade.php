{{-- <section class="first-screen" style="display: none;">
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
                                        <picture>
                                            @if ($item->addImageFormat())
                                                <source type="image/webp"
                                                    srcset="/{{ $item->addImageFormat()['imageWebp'] }}" />
                                            @endif
                                            <img width="324" height="220" loading="lazy"
                                                title="{{ $item->title }}" alt="{{ $item->title }}"
                                                src="{{ asset($item->getImage()) }}">
                                        </picture>
                                        <h3>{{ $item->title }}</h3>
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
                <li>
                    <a href="{{ route('tags.single', ['id' => $tag->id]) }}">{{ $tag->title }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
</section> --}}


<section class="new-first-screen">
    <div class="new-first-screen-row">
        <aside class="first-screen__aside">
            @foreach ($heros as $item)
                <h1>{{ $item->title }}</h1>
                {{-- {!! $item->description !!} --}}
                <p>
                    {{ strip_tags(str_replace('&nbsp;', ' ', $item->description)) }}
                </p>

            @endforeach

            {{-- <h3>Проверенные и&nbsp;классические рецепты</h3>
            <h4>Новые классные рецепты каждую неделю</h4>
            <h4>Рецепты по интересам:</h4> --}}
        </aside>
    </div>
    <ul class="new-first-screen__aside-tags">
        @foreach ($maps as $tag)
            {{-- @if ($tag->title === 'Христос воскрес')
                @continue
            @endif --}}
            <li>
                <a href="{{ route('tags.single', ['id' => $tag->id]) }}">{{ $tag->title }}</a>
            </li>
        @endforeach
    </ul>
    <div class="new-first-screen-row">
        @php $i = 0; @endphp
        @foreach ($lastPost as $item)
            @php $i++; @endphp
            <div class="new-first-screen-col {{ $i > 1 ? 'hits-recepts' : '' }}">
                <a href="{{ route('single', $item->slug) }}">
                    <picture>
                        @if ($item->addImageFormat())
                            <source type="image/webp" srcset="/{{ $item->addImageFormat()['imageWebp'] }}" />
                        @endif
                        <img width="324" height="220" loading="lazy" title="{{ $item->title }}"
                            alt="{{ $item->title }}" src="{{ asset($item->getImage()) }}">
                    </picture>
                    <div class="new-first-screen-col__content">
                        <h4>{{ date('d.m.Y H:i', strtotime($item->created_at)) }}</h4>
                        <h3>{{ $item->title }}</h3>
                        <p>
                            {{ strip_tags(str_replace('&nbsp;', ' ', $item->description)) }}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

</section>



