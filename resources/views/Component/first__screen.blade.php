<section class="first-screen">
    <div class="slider-hero swiper">
        <ul class="swiper-wrapper">
            @foreach ($heros as $item)
                <li class="swiper-slide">
                    <picture>
                        <img src="/{{ $item->image }}" alt="{{ $item->title }}">
                    </picture>
                    <div class="text">
                        <h1>{{ $item->title }}</h1>
                        {{-- <div>{!! $item->description !!}</div> --}}
                    </div>
                    {{-- <a class="btn" href="{{$item->link}}">Перейти</a> --}}
                </li>
            @endforeach
        </ul>
        <div class="swiper-pagination"></div>
    </div>
</section>
