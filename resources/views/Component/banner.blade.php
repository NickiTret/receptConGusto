
<section class="banner">
    <div class="container">
        @if (!empty($banner))
        <div class="image">
            <picture>
                <img src="/{{$data->image}}" alt="{{$data->title}}">
            </picture>
           </div>
           <div class="text">
            <h3>{{$data->subtitle}}</h3>
            <h2>{{$data->title}}</h2>
            <p>{!! $data->content !!}</p>
                {{-- <a href="{{$data->btn_link}}">{{$data->btn_name}}</a> --}}
           </div>
        @else
        <div class="image">
            <picture>
                <img src="/{{$category_item->image}}" alt="{{$category_item->title}}">
            </picture>
           </div>
           <div class="text">
            <h2>{{$category_item->title}}</h2>
            @if(!empty($category_item->description)) {
                <p>{!! $category_item->description !!}</p>
            }
            @endif
            <p>{!! $category_item->descr !!}</p>
           </div>
        @endif
    </div>
  </section>
