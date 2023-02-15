<section class="recept-day">
    <div class="container">
        <h2>Рецепт для вас</h2>

        <div class="content">
            <img src="{{ $random->thumbnail }}" alt="{{ $random->title }}">
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
