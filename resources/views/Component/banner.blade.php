
<section class="banner">
    <div class="container">
        @if (!empty($banner))
        <div class="image">
            <picture>
                @if ($data->addImageFormat())
                    <source type="image/avif" srcset="/{{ $data->addImageFormat()['imageAvif'] }}" />
                    <source type="image/webp" srcset="/{{ $data->addImageFormat()['imageWebp'] }}" />
                @endif
                <img loading="lazy" title="{{ $data->title }}" alt="{{ $data->title }}"
                    src="/{{ $data->addImageFormat()['imageDefault'] }}">

            </picture>
           </div>
           <div class="text">
            <h1>{{$data->title}}</h1>
            <h3>{{$data->subtitle}}</h3>
            <p>{{ strip_tags($data->content) }}</p>
                {{-- <a href="{{$data->btn_link}}">{{$data->btn_name}}</a> --}}
           </div>
        @else
        <div class="image">
            <picture>
                @if ($category_item->addImageFormat())
                    <source type="image/avif" srcset="/{{ $category_item->addImageFormat()['imageAvif'] }}" />
                    <source type="image/webp" srcset="/{{ $category_item->addImageFormat()['imageWebp'] }}" />
                @endif
                <img loading="lazy" title="{{ $category_item->title }}" alt="{{ $category_item->title }}"
                    src="/{{ $category_item->addImageFormat()['imageDefault'] }}">

            </picture>
           </div>
           <div class="text">
            <h1>{{$category_item->title}}</h1>
            @if(!empty($category_item->description))
                <p>{{ strip_tags( $category_item->description) }}</p>
            @endif
           </div>
        @endif
    </div>
  </section>
