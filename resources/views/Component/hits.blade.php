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
                <a href="{{  route('single',  $post->id) }}">
                    <img src="/{{$post->thumbnail}}" alt="{{$post->title}}">
                    <div class="top">
                        <span class="category">{{$post->category->title}}</span>
                        {{-- <span class="like">
                            <picture>
                                <img src="/content/like.png" alt="like">
                            </picture>
                        </span> --}}
                    </div>
                    <h3>{{$post->title}}</h3>
                    <p>{!! $post->description !!}</p>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
  </section>