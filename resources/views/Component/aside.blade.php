<section class="aside">
    <aside>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('single', $post->slug) }}">
                        <h4>{{ $post->title }}</h3>
                            <div class="disabled">
                                <img src="/{{ $post->thumbnail }}" alt="{{ $post->title }}">
                            </div>
                    </a>
                </li>
                <li>
                    <!-- Yandex.RTB R-A-2349463-3 -->
                    <div id="yandex_rtb_R-A-2349463-3"></div>
                    <script>
                        window.yaContextCb.push(() => {
                            Ya.Context.AdvManager.render({
                                "blockId": "R-A-2349463-3",
                                "renderTo": "yandex_rtb_R-A-2349463-3"
                            })
                        })
                    </script>
                </li>
            @endforeach
        </ul>
    </aside>
</section>
