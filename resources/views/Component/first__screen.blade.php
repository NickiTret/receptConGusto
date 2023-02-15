<section class="first-screen">
    <div class="container">
        <div class="slider-hero swiper">
            <ul class="swiper-wrapper">
                @foreach ($heros as $item)
                    
                <li class="swiper-slide">
                    <picture>
                        <img src="/{{$item->image}}" alt="{{$item->title}}">
                    </picture>
                    <h1>{{$item->title}}</h1>
                    <div>{!! $item->description !!}</div>
                    {{-- <a class="btn" href="{{$item->link}}">Перейти</a> --}}
                </li>
                @endforeach

            </ul>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>
</section>
