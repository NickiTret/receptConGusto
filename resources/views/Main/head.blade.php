<head lang="ru">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <meta name="yandex-verification" content="3519ed7046470147" />
    @if (!empty($seo))
        <title>{{ strip_tags($seo->title) }}</title>
        <meta name="description" content="{{ strip_tags($seo->description) }}">
        <meta name="twitter:card content="summary_large_image" />
        <meta property=”og:image” content="{{ asset($seo->image_page) }}" />
        <meta name="twitter:image" content="{{ asset($seo->image_page) }}" />
        <meta name="keywords" content="{{ strip_tags($seo->keywords) }}" />
    @else
        <title>Con gusto @if (!empty($data))
                - {{ strip_tags($data->title) }} - готовь с нами
            @elseif (!empty($banner) && empty($data))
                - {{ strip_tags($banner->title) }} - готовь с нами
            @else
                - готовь с нами по классическим рецептам e-con-gusto.ru
            @endif
        </title>
        @if (!empty($data->description))
            <meta name="description" content="{{ strip_tags($data->description) }}">
        @elseif (!empty($data->title))
            <meta name="description"
                content="Con gusto, рецепты, рецепты, домашняя еда по ресторанным рецептам {{ strip_tags($data->title) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @elseif (!empty($heros) || !empty($categories))
            <meta name="description"
                content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @elseif (!empty($banner) && empty($data))
            <meta name="description"
                content="{{ strip_tags($banner->subtitle) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @else
            <meta name="description"
                content="Con gusto, рецепты, домашняя еда по ресторанным рецептам. Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @endif
        @if (!empty($post->thumbnail))
            <meta property=”og:image” content="{{ asset($post->thumbnail) }}" />
            <meta name="twitter:image" content="{{ asset($post->thumbnail) }}" />
        @elseif (!empty($banner) && empty($data))
            <meta property=”og:image” content="{{ asset($banner->image) }}" />
            <meta name="twitter:image" content="{{ asset($banner->image) }}" />
        @elseif (!empty($category_item) && empty($post->thumbnail))
            <meta property=”og:image” content="{{ asset($category_item->image) }}" />
            <meta name="twitter:image" content="{{ asset($category_item->image) }}" />
        @elseif (!empty($data->image))
            <meta property=”og:image” content="{{ asset($data->image) }}" />
            <meta name="twitter:image" content="{{ asset($data->image) }}" />
        @endif
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('css/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/main/main.style.min.css') }}?311" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


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
    <script type="text/javascript">
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
        <div><img src="https://top-fwz1.mail.ru/counter?id=3328776;js=na" style="position:absolute;left:-9999px;"
                alt="Top.Mail.Ru" /></div>
    </noscript>
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
    <noscript>
        <img src="//counter.rambler.ru/top100.cnt?pid=7715281" alt="Топ-100" />
    </noscript>
    <!-- END Top100 (Kraken) Counter -->
    @endenv




    <meta name="robots" content="all" />
</head>
