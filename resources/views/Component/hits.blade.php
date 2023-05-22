<section class="hits">
    <div class="container">
        {{-- <h2>{{$posts[0]->category->title}}</h2> --}}
        @if (count($posts) == 0)
            <h3>Нечего не найдено по вашему запросу</h3>
        @endif
        @if (!empty($posts))
        <ul>
            @foreach ($posts as $post)
            <li>
                <a href="{{  route('single',  $post->slug) }}">
                    @if (!empty($post->thumbnail))
                    <img src="/{{$post->thumbnail}}" alt="{{$post->title}}">
                    @else
                    <img src="/{{$post->image}}" alt="{{$post->title}}">
                    @endif
                    <div class="top">
                            @if (!empty($post->category->title))
                            <span class="category">
                                  {{$post->category->title}}
                            </span>
                            @endif

                            @if (!empty($post->views))
                            <span class="views">
                                 {{$post->views}}
                            </span>
                            @endif
                    </div>
                    <h3>{{$post->title}}</h3>
                    <div class="scroll">{!! $post->description !!}</div>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
  </section>
