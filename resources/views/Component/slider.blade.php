<section class="slider">
    <div class="slider-container container">
        <div class="tabs" data-tabs="tab">
            <ul class="tabs__nav">
                @foreach ($groups as $item)
                    @if (count($item->sous))
                        <li class="tabs__nav-item"><button class="tabs__nav-btn  btn-main"
                                type="button">{{ $item->title }}</button></li>
                    @endif
                @endforeach
            </ul>
            <div class="tabs__content">
                @foreach ($groups as $slider)
                    {{-- {{ dd($slider->sous) }} --}}
                    @if (count($slider->sous))
                        <div class="tabs__panel">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;"
                                class="swiper swiper-special mySwiper-{{ $slider->id }}">
                                <div class="swiper-wrapper" data-json="{{ $slider->sous }}">
                                    @foreach ($slider->sous as $item_slide)
                                        <div class="swiper-slide">
                                            <img src="{{ $item_slide->getImage() }}" alt="{{ $item_slide->title }}" />
                                            <div class="swiper-slide__description">
                                                <h3>{{ $item_slide->title }}</h3>
                                                <div>
                                                    {!! $item_slide->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                                {{-- <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div> --}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
