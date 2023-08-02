<section class="aside">
    <aside>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('single', $post->slug) }}">
                        <h4>{{ $post->title }}</h3>
                            {{-- <div class="disabled">
                                @if (!empty($post->thumbnail))
                                    <img loading="lazy" src="/{{ $post->thumbnail }}" alt="{{ $post->title }}">
                                @else
                                    <img loading="lazy" src="/{{ $post->image }}" alt="{{ $post->title }}">
                                @endif
                            </div> --}}
                    </a>
                </li>
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
