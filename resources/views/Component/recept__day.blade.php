<section class="recept-day">
    <div data-aos="fade-up" class="container">
        <h2>Случайный рецепт</h2>
        <div class="content">
            <div class="image">
                <picture>
                    @if ($random->addImageFormat())
                        {{-- <source type="image/avif" srcset="/{{ $random->addImageFormat()['imageAvif'] }}" /> --}}
                        <source type="image/webp" srcset="/{{ $random->addImageFormat()['imageWebp'] }}" />
                    @endif
                    <img loading="lazy" title="{{ $random->title }}" alt="{{ $random->title }}"
                        src="/{{ $random->addImageFormat()['imageDefault'] }}">

                </picture>
            </div>
            <div class="content-text">
                <h3>{{ $random->title }}</h3>
                {!! $random->description !!}
                <a href="{{ route('single', $random->slug) }}">
                    Перейти
                </a>
            </div>
        </div>
    </div>
</section>
