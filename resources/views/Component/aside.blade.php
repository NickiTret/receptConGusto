<section class="aside">
    <aside>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('single', $post->slug) }}">
                        <h4>{{ $post->title }}</h3>
                            <div class="disabled">
                                @if (!empty($post->thumbnail))
                                    <img src="/{{ $post->thumbnail }}" alt="{{ $post->title }}">
                                @else
                                    <img src="/{{ $post->image }}" alt="{{ $post->title }}">
                                @endif
                            </div>
                    </a>
                </li>
            @endforeach
            <li>
                <div id="marketWidget"></div>
            </li>
        </ul>
    </aside>
</section>
