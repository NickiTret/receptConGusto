<section class="simple">
    <div data-aos="slide-right" data-aos-duration="1500" class="container">
        @if (!empty($fasts))
            <h2>Быстрые рецепты</h2>
        @endif
        <div class="scroll" data-simplebar>
            <ul>
                @foreach ($fasts as $item)
                    <li>
                        <a href="{{ route('fast', $item->slug) }}">
                            <picture>
                                @if ($item->addImageFormat())
                                    <source type="image/avif" srcset="/{{ $item->addImageFormat()['imageAvif'] }}" />
                                    <source type="image/webp" srcset="/{{ $item->addImageFormat()['imageWebp'] }}" />
                                @endif
                                <img loading="lazy" title="{{ $item->title }}" alt="{{ $item->title }}"
                                    src="/{{ $item->addImageFormat()['imageDefault'] }}">

                            </picture>
                            <p>Всего &mdash; <span>за 5 минут</span></p>
                            <p class="text">{{ $item->title }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
