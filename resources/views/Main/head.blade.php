<head lang="ru">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <meta name="yandex-verification" content="3519ed7046470147" />
    <title>Con gusto @if (!empty($data))
            - {{ strip_tags($data->title) }}
        @endif
    </title>
    @if (!empty($data->description))
        <meta name="description" content="{{ strip_tags($data->description) }}">
    @elseif (!empty($data->title))
        <meta name="description"
            content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно {{ strip_tags($data->title) }}">
    @elseif (!empty($heros) || !empty($categories))
        <meta name="description" content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно">
    @endif
    <link rel="icon" href="{{ asset('css/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/main/main.style.min.css') }}?03" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
    <noscript>
        <div>
            <img src="https://top-fwz1.mail.ru/counter?id=3328776;js=na" style="position:absolute;left:-9999px;"
                alt="Top.Mail.Ru" >
        </div>
    </noscript>
    <!-- /Top.Mail.Ru counter -->
    <script>
        mailru_ad_client = "ad-1256561";
        mailru_ad_slot = 1256561;
    </script>
    <script src="https://rs.mail.ru/static/ads-min.js"></script>
    <!-- Yandex.RTB -->
    <script>
        window.yaContextCb = window.yaContextCb || []
    </script>
    <script src="https://yandex.ru/ads/system/context.js" async></script>
</head>
