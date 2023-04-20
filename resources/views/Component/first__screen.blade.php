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
                        <div>{!! $item->description !!}</div>
                        <div>Последние рецепты</div>
                        <ul class="text-list">
                            @foreach ($lastPost as $item)
                            <li class="text-list__item">
                                <a href="{{  route('single',  $item->slug) }}">
                                    <img src="/{{ $item->thumbnail }}" alt="{{ $item->title }}">
                                   <h3>{{  $item->title }}</h3>
                                   <p>{!!  $item->description !!}</p>
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
        <h3>Проверенные и классические рецепты</h3>
        <h4>Новые рецепты каждую неделю</h4>
        <ul class="first-screen__aside-list">
            <li>
                <p>{{ $allPosts->count() + $fasts->count() }}</p>
                <h4>Рецептов на сайте</h4>
            </li>
        </ul>
    </aside>
</section>



