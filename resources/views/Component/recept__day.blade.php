<section class="recept-day">
    <div class="container">
        <h2>Случайный рецепт</h2>
        <div class="content">
            <div class="image">
                <picture>
                    <img src="{{ $random->thumbnail }}" alt="{{ $random->title }}">
                </picture>
            </div>
            <div class="content-text">
                <h3>{{$random->title}}</h3>
                    <p>
                        {!! $random->description !!}
                    </p>
                    <a href="{{  route('single',  $random->id) }}">Перейти</a>
            </div>
        </div>
    </div>
</section>
