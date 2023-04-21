
<section class="transform">
    <div class="container">
    <!-- Yandex.RTB R-A-2349463-1 -->
<div id="yandex_rtb_R-A-2349463-1"></div>
<script>window.yaContextCb.push(()=>{
	Ya.Context.AdvManager.render({
		"blockId": "R-A-2349463-1",
		"renderTo": "yandex_rtb_R-A-2349463-1"
	})
})
</script>
<!-- Yandex.RTB R-A-2349463-2 -->
<script>window.yaContextCb.push(()=>{
	Ya.Context.AdvManager.render({
		"blockId": "R-A-2349463-2",
		"type": "floorAd"
	})
})

</script>
</div>
</section>
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
    <div><img src="https://mc.yandex.ru/watch/92999372" style="position:absolute; left:-9999px;" alt="" ></div>
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


    <!-- Top.Mail.Ru counter -->
    <script>
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({
            id: "3328776",
            type: "pageView",
            start: (new Date()).getTime()
        });
        (function(d, w, id) {
            if (d.getElementById(id)) return;
            var ts = d.createElement("script");
            ts.type = "text/javascript";
            ts.async = true;
            ts.id = id;
            ts.src = "https://top-fwz1.mail.ru/js/code.js";
            var f = function() {
                var s = d.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(ts, s);
            };
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "tmr-code");
    </script>
    <noscript>
        <div>
            <img src="https://top-fwz1.mail.ru/counter?id=3328776;js=na" style="position:absolute;left:-9999px;"
                alt="Top.Mail.Ru" >
        </div>
    </noscript>
    <!-- /Top.Mail.Ru counter -->
