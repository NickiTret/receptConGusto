
<section class="banner">
    <div class="container">
       <div class="image">
        <picture>
            <img src="{{$data->image}}" alt="{{$data->title}}">
        </picture>
       </div>
       <div class="text">
        <h3>{{$data->subtitle}}</h3>
        <h2>{{$data->title}}</h2>
        <p>{!! $data->content !!}</p>
            <a href="{{$data->btn_link}}">{{$data->btn_name}}</a>
       </div>
    </div>
  </section>