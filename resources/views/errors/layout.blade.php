<!DOCTYPE html>
<html lang="ru" class="page">

<head lang="ru">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <meta name="yandex-verification" content="3519ed7046470147" />
    <meta name="robots" content="noindex, follow"/>
    <title>Con Gusto - Страница не найдена</title>
    <meta name="description" content="Страница не найдена или не существует">
    <link rel="icon" href="{{ asset('css/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/main/main.style.min.css') }}?327" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    @env('local')
    <!-- Yandex Native Ads -->
    <!-- Yandex.RTB -->
    <script>
        window.yaContextCb = window.yaContextCb || []
    </script>
    <script src="https://yandex.ru/ads/system/context.js" async></script>
    <noscript>
        <style>
            .simplebar-content-wrapper {
                scrollbar-width: auto;
                -ms-overflow-style: auto;
            }

            .simplebar-content-wrapper::-webkit-scrollbar,
            .simplebar-hide-scrollbar::-webkit-scrollbar {
                display: initial;
                width: initial;
                height: initial;
            }
        </style>
    </noscript>
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
    <script>
        (function(w, d, c) {
            (w[c] = w[c] || []).push(function() {
                var options = {
                    project: 7715281,
                };
                try {
                    w.top100Counter = new top100(options);
                } catch (e) {}
            });
            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function() {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src =
                (d.location.protocol == "https:" ? "https:" : "http:") +
                "//st.top100.ru/top100/top100.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(window, document, "_top100q");
    </script>
    <script>
        var mi = document.createElement('script');
        mi.type = 'text/javascript';
        mi.async = true;
        mi.src = (document.location.protocol == 'https:' ? 'https' : 'http') + '://counter.megaindex.ru/core.js?t;' +
            escape(document.referrer) + ((typeof(screen) == 'undefined') ? '' : ';' + screen.width + '*' + screen.height) +
            ';' + escape(document.URL) + ';' + document.title.substring(0, 256) + ';1675943';
        document.getElementsByTagName('head')[0].appendChild(mi);
    </script>
    <!-- Stat.MegaIndex.ru End -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BCDZCP104C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BCDZCP104C');
    </script>
    @endenv
</head>


<body class="page__body">
    {{-- @include('Main.header', ['headers' => $headers]) --}}
    <div class="site-container error-page">
        <main>
            <div class="container">
                <div class="circle"></div>
                <h1>404</h1>
                <h2>Страница не найдена</h2>
                <div>
                    <a href="/">Главная страница</a>
                </div>

            </div>
        </main>
        {{-- @include('Main.footer') --}}
    </div>
    <script type="module" src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
