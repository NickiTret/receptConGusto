<section class="hits">
    <div class="container">
        {{-- <h2>{{$posts[0]->category->title}}</h2> --}}
        @if (count($posts) == 0)
            <h3>Нечего не найдено по вашему запросу</h3>
        @endif
        @if(isset($tag) &&  $tag->title)
            <h2>{{$tag->title}}</h2>
        @endif
        @if (!empty($posts))
            <ul>
                @foreach ($posts as $post)
                    <li @if (!empty($post->category_id)) class="hits-recepts" @endif>
                        <a href="{{ route('single', $post->slug) }}">
                            <picture>
                                @if ($post->addImageFormat())
                                    <source type="image/avif" srcset="/{{ $post->addImageFormat()['imageAvif'] }}" />
                                    <source type="image/webp" srcset="/{{ $post->addImageFormat()['imageWebp'] }}" />
                                @endif
                                <img loading="lazy" title="{{ $post->title }}" alt="{{ $post->title }}"
                                    src="/{{ $post->addImageFormat()['imageDefault'] }}">

                            </picture>
                            <div class="top">
                                @if (!empty($post->category->title))
                                    <span class="category">
                                        {{ $post->category->title }}
                                    </span>
                                @endif

                                @if (!empty($post->views))
                                    <span class="views">
                                        {{ $post->views }}
                                    </span>
                                @endif
                            </div>
                            <h3>{{ $post->title }}</h3>
                            <div class="scroll">{!! $post->description !!}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
