@env('local')
<section class="transform">
    <div class="container">
        <!-- Yandex.RTB R-A-2349463-15 -->
        <div id="yandex_rtb_R-A-2349463-15"></div>
        <script>
            window.yaContextCb.push(() => {
                Ya.Context.AdvManager.render({
                    "blockId": "R-A-2349463-15",
                    "renderTo": "yandex_rtb_R-A-2349463-15"
                })
            })
        </script>
    </div>
</section>
<!-- Top.Mail.Ru counter -->
<script type="text/javascript">
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({
        id: "3384116",
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
    <div><img src="https://top-fwz1.mail.ru/counter?id=3384116;js=na" style="position:absolute;left:-9999px;"
            alt="Top.Mail.Ru" /></div>
</noscript>
<!-- /Top.Mail.Ru counter -->
@endenv
<footer class="footer">
    <div class="container">

        <nav>
            <ul>
                @foreach ($headers as $header_item)
                    @if ($loop->iteration == 5)
                        @continue
                    @endif
                    <li>
                        <a href=" {{ $header_item->link }}">{{ $header_item->title }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

    </div>
    <div class="container">
        <div class="left-box">
            <p>&copy; <span id="year"></span>&nbsp;Con&nbsp;Gusto</p>
            <p>Разработка&nbsp;сайта - <a href="https://infonickweb.ru/" target="_blank">NickWeb&nbsp;Create</a>
            </p>
        </div>
        <script>
            // Получение текущего года и вставка в элемент
            const currentYear = new Date().getFullYear();
            document.getElementById('year').textContent = currentYear;
        </script>
        <ul class="social">
            <li>
                <a href="https://t.me/econgusto" target="_blank">Telegram</a>
            </li>

            <li>
                <a href="https://vk.com/public221195230" target="_blank">VK</a>
            </li>
            <li>
                <a href="https://ok.ru/group/70000003459339" target="_blank">ОК!</a>
            </li>
            <li>
                <a href="https://rutube.ru/channel/32029491/" target="_blank">RUTUBE</a>
            </li>
            {{-- <li>
                <a href="{{ route('contact.form') }}">Задать вопрос?</a>
            </li> --}}

        </ul>
    </div>


    @if (!$hasAcceptedCookies)
        <!-- Cookies policy -->
        <div class="cookies-block" id="cookie-policy">
            <div class="container">
                <div class="cb-content">
                    <div class="cbc-text">
                        Наш сайт использует файлы cookie и похожие технологии, чтобы гарантировать максимальное удобство
                        пользователям...

                        Продолжая работу с сайтом, вы соглашаетесь <a href="/cookie-policy" target="_blank">с использованием файлов cookie</a>
                    </div>
                    <button id="accept-cookie" type="button" class="cb-close btn-drop">
                        <div class="btn-drop__icon close">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.6569 1.65685L1.34315 12.9706M12.6569 12.9706L1.34315 1.65685"
                                    stroke="white" stroke-width="2" />
                            </svg>

                        </div>
                    </button>
                </div>
            </div>
        </div>

        <script>

        </script>
    @endif




    <div class="container" style="margin-top: 14px">
        <!--LiveInternet counter--><a href="https://www.liveinternet.ru/click" target="_blank"><img id="licnt5139"
                width="88" height="15" style="border:0"
                title="LiveInternet: показано число посетителей за сегодня"
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7"
                alt="" /></a>
        <script>
            (function(d, s) {
                d.getElementById("licnt5139").src =
                    "https://counter.yadro.ru/hit?t24.2;r" + escape(d.referrer) +
                    ((typeof(s) == "undefined") ? "" : ";s" + s.width + "*" + s.height + "*" +
                        (s.colorDepth ? s.colorDepth : s.pixelDepth)) + ";u" + escape(d.URL) +
                    ";h" + escape(d.title.substring(0, 150)) + ";" + Math.random()
            })
            (document, screen)
        </script>
        <!--/LiveInternet-->


    </div>
</footer>




<!-- Загрузочный экран -->
<div id="loader">
    <div class="spinner">

    </div>
</div>

<style>
    /* Стили для загрузочного экрана */
    #loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: #F7F7F7;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url(/assets/base/logo2.webp);
        background-position: center 180px;
        background-repeat: no-repeat;
        background-size: 350px;
        transition: all 0.2s ease-in-out
    }

    .spinner {
        border: 9px solid #f3f3f3;
        border-top: 9px solid #3498db;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
