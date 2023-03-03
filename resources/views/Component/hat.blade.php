@if (!empty($data))
<section class="hat">
    @if (!empty($data->image))
    <div class="image">
        <picture>
            <img src="/{{$data->image}}" alt="logo">
        </picture>
    </div>
    @endif

    <div class="content">
        @if (!empty($data->title))
        <h1>{{$data->title}}</h1>
        @else
        <h1>Поиск по параметрам</h1>
        @endif
        
        @if (!empty($data->content))
        <h3>{!! $data->content !!}</h3>
        @endif
    </div>
</section>
@endif
