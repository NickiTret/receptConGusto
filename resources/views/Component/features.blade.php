<section class="features">
  @foreach ($data as $item)
  <div class="image-box" data-reveal="left">
    <img src="{{$item->image}}" alt="{{$item->title}}" class="{{$item->title}}">
  </div>
  <div class="content-box">
    <h2 class="title" data-reveal="left">
      {{$item->title}}
    </h2>
    <div class="text" data-reveal="left">
      {!! $item->content !!}
    </div>
  </div>
  @endforeach

  {{-- <div class="content-box">
    <h2 class="title" data-reveal="left">
      Turkish coffee
    </h2>
    <div class="text" data-reveal="left">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id laborum iste doloremque ab facere unde alias sit commodi accusamus? Eius ut molestiae nemo perspiciatis, pariatur numquam accusamus voluptatem libero sint.
      </p>
    </div>
  </div>
  <div class="image-box" data-reveal="left">
    <img src="https://podacha-blud.com/uploads/posts/2022-12/1670994933_28-podacha-blud-com-p-vidi-ponchikov-foto-28.jpg" alt="" class="img">
  </div> --}}
</section>