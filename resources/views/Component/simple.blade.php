<section class="simple">
    <div data-aos="slide-right" data-aos-duration="1500" class="container">
        @if (!empty($fasts))
        <h2>Быстро</h2>
        @endif
        <div class="scroll" data-simplebar>
            <ul>
                @foreach ($fasts as $item)
                <li>
                    <a href="{{  route('fast',  $item->id) }}">
                        <img src="/{{ $item->image }}" alt="{{ $item->title }}">
                        <p>Всего &mdash; <span>за 5 минут</span></p>
                        <p class="text">{{ $item->title }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
