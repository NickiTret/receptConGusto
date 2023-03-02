@if (!empty($hat))
<section class="hat">
    <div class="image">
        <picture>
            <img src="/{{$hat->image}}" alt="logo">
        </picture>
    </div>
    <div class="content">
        <h1>{{$hat->title}}</h1>
        <h3>{!! $hat->content !!}</h3>
    </div>
</section>
@endif
