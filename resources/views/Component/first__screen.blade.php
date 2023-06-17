<section class="first-screen">
    <div class="slider-hero swiper">
        <ul class="swiper-wrapper">
            @foreach ($heros as $item)
                <li class="swiper-slide">
                    <picture>
                        <img loading="lazy" src="/{{ $item->image }}" alt="{{ $item->title }}">
                    </picture>
                    <div class="text text__left">
                        <h1>{{ $item->title }}</h1>
                        <h2>{!! $item->description !!}</h2>
                        <ul class="text-list">
                            @foreach ($lastPost as $item)
                            <li class="text-list__item">
                                <a href="{{  route('single',  $item->slug) }}">
                                    <img loading="lazy" src="/{{ $item->thumbnail }}" alt="{{ $item->title }}">
                                   <h3>{{  $item->title }}</h3>
                                   {!!  $item->description !!}
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
        <h4>Новые рецепты каждую неделю</h4>
        <ul class="first-screen__aside-list">
            <li>
                <p>{{ $allPosts->count() + $fasts->count() }}</p>
                <h4>Рецептов на&nbsp;сайте</h4>
            </li>
        </ul>
{{--        <h3>Рецепты по&nbsp;тегам:</h3>--}}
        <ul class="first-screen__aside-tags">
            @foreach ($maps as $tag)
                <li>
                    <a href="{{ route('tags.single', ['id' => $tag->id]) }}">{{ $tag->title }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
</section>



