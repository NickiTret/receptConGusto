<section class="features">
  @foreach ($data as $item)
  @if($loop->iteration % 2)
    <div class="image-box" data-reveal="right">
      <img loading="lazy" src="{{$item->image}}" alt="{{$item->title}}" class="{{$item->title}}">
    </div>
    <div class="content-box">
      <h2 class="title" data-reveal="left">
        {{$item->title}}
      </h2>
      <div class="text" data-reveal="left">
        {!! $item->content !!}
      </div>
    </div>
    @else
    <div class="content-box">
      <h2 class="title" data-reveal="left">
        {{$item->title}}
      </h2>
      <div class="text" data-reveal="right">
        {!! $item->content !!}
      </div>
    </div>
    <div class="image-box" data-reveal="right">
      <img loading="lazy" src="{{$item->image}}" alt="{{$item->title}}" class="{{$item->title}}">
    </div>
    @endif
  @endforeach
</section>
