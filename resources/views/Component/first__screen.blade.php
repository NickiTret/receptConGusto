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
                    <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
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
                <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
            </li>
        @endforeach
    </ul>
    <div class="new-first-screen-row">
        @php $i = 0; @endphp
        @foreach ($lastPost as $item)
            @php
                // Извлекаем путь из URL
                $imagePath = parse_url($item->getImage(), PHP_URL_PATH);
                $imagePath = ltrim($imagePath, '/');

                // Определяем размеры для ресайза
                if ($loop->first) {
                    $resizedImagePath = \App\Models\GeneralModel::resize(1496, 674, $imagePath);
                    $resizedImagePath480 = \App\Models\GeneralModel::resize(480, 400, $imagePath, 100);
                } else {
                    $resizedImagePath = \App\Models\GeneralModel::resize(858, 200, $imagePath);
                    $resizedImagePath480 = \App\Models\GeneralModel::resize(398, 200, $imagePath, 100);
                }

                // WebP формат
                $resizedImagePathWebp = $item->addImageFormat()
                    ? \App\Models\GeneralModel::resize(
                        1496,
                        674,
                        ltrim(parse_url($item->addImageFormat()['imageWebp'], PHP_URL_PATH), '/'),
                        100,
                    )
                    : null;
            @endphp

            <div class="new-first-screen-col {{ $loop->iteration > 1 ? 'hits-recepts' : '' }}">
                <a href="{{ route('single', $item->slug) }}">
                    <picture>
                        <source media="(max-width: 480px)" srcset="{{ asset($resizedImagePath480) }}">

                        @if ($resizedImagePathWebp)
                            <source type="image/webp" srcset="{{ asset($resizedImagePathWebp) }}">
                        @endif

                        <img width="324" height="220" loading="lazy" title="{{ $item->title }}"
                            alt="{{ $item->title }}" src="{{ asset($resizedImagePath) }}">
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
