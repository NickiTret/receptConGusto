<section class="aside">
    <aside>
        <ul>
            @foreach ($posts as $post)
                @if (isset($post->category_id))
                    <li>
                        <a href="{{ route('single', $post->slug) }}">
                            <h4>{{ $post->title }}</h4>
                            {{-- <div class="disabled">
                            @if (!empty($post->thumbnail))
                                <img loading="lazy" src="/{{ $post->thumbnail }}" alt="{{ $post->title }}">
                            @else
                                <img loading="lazy" src="/{{ $post->image }}" alt="{{ $post->title }}">
                            @endif
                        </div> --}}
                        </a>
                    </li>
                @elseif(!isset($post->category_id))
                    <li>
                        <a href="{{ route('new', $post->slug) }}">
                            <h4>{{ $post->title }}</h4>
                        </a>
                    </li>
                @endif
            @endforeach
            @env('local')
            <li>
                <!-- Yandex.RTB R-A-2349463-12 -->
                <div id="yandex_rtb_R-A-2349463-12"></div>
                <script>
                    window.yaContextCb.push(() => {
                        Ya.Context.AdvManager.render({
                            "blockId": "R-A-2349463-12",
                            "renderTo": "yandex_rtb_R-A-2349463-12"
                        })
                    })
                </script>
            </li>
            @endenv

        </ul>
    </aside>
</section>
