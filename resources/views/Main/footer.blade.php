<footer class="footer">
    <div class="container">
        <div class="left-box">
            <p>Разработка сайта - <a href="http://infonickweb.ru/" target="_blank">NICKWEB</a>
            </p>
        </div>
        <nav>
            <ul>
                @foreach ($headers as $header_item)
                    <li>
                        <a href=" {{ $header_item->link }}">{{ $header_item->title }}</a>
                    </li>
                @endforeach
            </ul>
    </div>
    </div>
</footer>

<script type="module" src="{{ asset('assets/js/main.js') }}"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
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
    <div><img src="https://mc.yandex.ru/watch/92999372" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VXQC75FB6B"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VXQC75FB6B');
</script>
