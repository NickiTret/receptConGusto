<head lang="ru">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <meta name="yandex-verification" content="3519ed7046470147" />
    <link rel="canonical" href="{{ url()->current() }}" />


    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    @if (!empty($seo))
        <title>{{strip_tags($seo->title)}}</title>
        <meta name="description" content="{{ strip_tags($seo->description)}}">
        <meta property="og:title" content="{{strip_tags($seo->title)}}">
    <meta property="og:description" content="{{ strip_tags($seo->description)}}">
        <meta name="twitter:card" content="summary_large_image" />
        <meta property="og:image" content="{{asset($seo->image_page)}}" />
        <meta name="twitter:image" content="{{asset($seo->image_page)}}" />
        <meta name="keywords" content="{{strip_tags($seo->keywords)}}" />
    @else
        <title>
            @if (!empty($data))
                {{ strip_tags($data->title) }} - готовь с нами
            @elseif (!empty($banner) && empty($data))
                {{ strip_tags($banner->title) }} - готовь с нами
            @else
                готовь с нами по классическим рецептам e-con-gusto.ru
            @endif – Con gusto
        </title>
        @if (!empty($data->description))
            <meta name="description" content="{{ strip_tags($data->description) }}">
            <meta property="og:description" content="{{ strip_tags($data->description) }}">
        @elseif (!empty($data->title))
            <meta name="description"
                content="Con gusto, рецепты, рецепты, домашняя еда по ресторанным рецептам {{ strip_tags($data->title) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
                <meta property="og:description" content="Con gusto, рецепты, рецепты, домашняя еда по ресторанным рецептам {{ strip_tags($data->title) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @elseif (!empty($heros) || !empty($categories))
            <meta name="description"
                content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
                <meta property="og:description" content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @elseif (!empty($banner) && empty($data))
            <meta name="description"
                content="{{ strip_tags($banner->subtitle) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
                <meta property="og:description" content="{{ strip_tags($banner->subtitle) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @else
            <meta name="description"
                content="Con gusto, рецепты, домашняя еда по ресторанным рецептам. Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
                <meta property="og:description" content="Con gusto, рецепты, домашняя еда по ресторанным рецептам. Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @endif
        @if (!empty($post->thumbnail))
            <meta property="og:image" content="{{ asset($post->thumbnail) }}" />
            <meta name="twitter:image" content="{{ asset($post->thumbnail) }}" />
        @elseif (!empty($banner) && empty($data))
            <meta property="og:image" content="{{ asset($banner->image) }}" />
            <meta name="twitter:image" content="{{ asset($banner->image) }}" />
        @elseif (!empty($category_item) && empty($post->thumbnail))
            <meta property="og:image" content="{{ asset($category_item->image) }}" />
            <meta name="twitter:image" content="{{ asset($category_item->image) }}" />
        @elseif (!empty($data->image))
            <meta property="og:image" content="{{ asset($data->image) }}" />
            <meta name="twitter:image" content="{{ asset($data->image) }}" />
        @endif
    @endif





    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('css/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/main/main.style.min.css') }}?13" rel="stylesheet">
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
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
    {{-- <noscript>
        <div>
            <img src="https://top-fwz1.mail.ru/counter?id=3328776;js=na" style="position:absolute;left:-9999px;"
                alt="Top.Mail.Ru" />
            </div>
    </noscript> --}}
    <!-- /Top.Mail.Ru counter -->
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
    {{-- <noscript>
        <img src="//counter.rambler.ru/top100.cnt?pid=7715281" alt="Топ-100" />
    </noscript> --}}
    <!-- END Top100 (Kraken) Counter -->
    <!-- Stat.MegaIndex.ru Start -->
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
    <script defer src="{{ asset('assets/js/main.js') }}?18"></script>
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
    {{-- <noscript>
    <div><img src="https://mc.yandex.ru/watch/92999372" style="position:absolute; left:-9999px;" alt="">
    </div>
</noscript> --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VXQC75FB6B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-VXQC75FB6B');
    </script>
</head>
