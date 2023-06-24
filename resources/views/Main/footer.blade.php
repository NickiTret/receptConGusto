
    <section class="transform">
        <div class="container">
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
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="left-box">
                <p>&copy; 2023 Con Gusto</p>
                <p>Разработка сайта - <a href="https://infonickweb.ru/" target="_blank">NickWeb&nbsp;reate</a>
                </p>
            </div>
            <nav>
                <ul>
                    {{-- @foreach ($headers as $header_item)
                        @if ($loop->iteration == 5)
                            @continue
                        @endif
                        <li>
                            <a href=" {{ $header_item->link }}">{{ $header_item->title }}</a>
                        </li>
                    @endforeach --}}
                    <li>
                         <a href="https://t.me/econgusto" target="_blank">Telegram</a>
                    </li>

                    <li>
                         <a href="https://dzen.ru/e-con-gusto.ru" target="_blank">Дзен</a>
                    </li>

                    <li>
                        <a href="https://vk.com/public221195230" target="_blank">VK</a>
                   </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <nav>
                <ul>
                    <li>
                        <a href='http://modnayamoda.ru/recepty/produkty-svojstva-polza/' target="_blank" title='Продукты свойства польза'>Promotion.su</a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
    <script type="module" src="{{ asset('assets/js/main.js') }}?8"></script>
    <!-- Yandex.Metrika counter -->
    <script>
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(92999372, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/92999372" style="position:absolute; left:-9999px;" alt="">
        </div>
    </noscript>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VXQC75FB6B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-VXQC75FB6B');
    </script>
