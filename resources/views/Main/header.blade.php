
    <!-- Перемещенные и оптимизированные скрипты -->
    <script async src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script async src="https://yandex.ru/ads/system/context.js"></script>
    <script defer src="{{ asset('assets/js/main.js') }}?18"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VXQC75FB6B"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/main/main.style.min.css') }}?19" rel="stylesheet">

    <script>
        // window.yaContextCb = window.yaContextCb || [];
        // (function(w, d, c) {
        //     (w[c] = w[c] || []).push(function() {
        //         var options = {
        //             project: 7715281,
        //         };
        //         try {
        //             w.top100Counter = new top100(options);
        //         } catch (e) {}
        //     });
        //     var n = d.getElementsByTagName("script")[0],
        //         s = d.createElement("script"),
        //         f = function() {
        //             n.parentNode.insertBefore(s, n);
        //         };
        //     s.type = "text/javascript";
        //     s.async = true;
        //     s.src =
        //         (d.location.protocol == "https:" ? "https:" : "http:") +
        //         "//st.top100.ru/top100/top100.js";

        //     if (w.opera == "[object Opera]") {
        //         d.addEventListener("DOMContentLoaded", f, false);
        //     } else {
        //         f();
        //     }
        // })(window, document, "_top100q");

        // var mi = document.createElement('script');
        // mi.type = 'text/javascript';
        // mi.async = true;
        // mi.src = (document.location.protocol == 'https:' ? 'https' : 'http') + '://counter.megaindex.ru/core.js?t;' +
        //     escape(document.referrer) + ((typeof(screen) == 'undefined') ? '' : ';' + screen.width + '*' + screen.height) +
        //     ';' + escape(document.URL) + ';' + document.title.substring(0, 256) + ';1675943';
        // document.getElementsByTagName('head')[0].appendChild(mi);

        // (function(m, e, t, r, i, k, a) {
        //     m[i] = m[i] || function() {
        //         (m[i].a = m[i].a || []).push(arguments)
        //     };
        //     m[i].l = 1 * new Date();
        //     for (var j = 0; j < document.scripts.length; j++) {
        //         if (document.scripts[j].src === r) {
        //             return;
        //         }
        //     }
        //     k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
        //         k, a)
        // })
        // (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        // ym(92999372, "init", {
        //     clickmap: true,
        //     trackLinks: true,
        //     accurateTrackBounce: true
        // });

        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-VXQC75FB6B');
    </script>

    <noscript>
        {{-- <div><img src="https://mc.yandex.ru/watch/92999372" style="position:absolute; left:-9999px;" alt=""></div> --}}
        {{-- <img src="//counter.rambler.ru/top100.cnt?pid=7715281" alt="Топ-100" /> --}}
    </noscript>


    <script>
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(92999372, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/92999372" style="position:absolute; left:-9999px;" alt=""></div>
    </noscript>

    <header class="header">
        <div class="container-header">
            <a href="/" class="logo">
                <picture>
                    <source type="image/webp" srcset="{{ asset('assets/base/logo2.webp') }}" />
                    <img loading="lazy" width="200" src="{{ asset('assets/base/logo2.png') }}" alt="logo">
                </picture>
            </a>
            <button type="button" class="burger" aria-label="Открыть меню" data-burger>
                <span class="burger__line"></span>
            </button>
            <nav title="Главное меню" data-menu>
                <ul class="reset-list">
                    @foreach ($headers as $header_item)
                        {{-- @if ($header_item->title == 'Пасха')
                        @continue
                    @endif --}}
                        <li>
                            <a href="{{ $header_item->link }}">{{ $header_item->title }}</a>
                        </li>
                    @endforeach
                </ul>
                <ul class="reset-list category-list-mobile">
                    @foreach ($categories_menu as $item)
                        @if ($item->posts->count())
                            {{-- @if ($item->title === 'Пасха')
                            @continue
                        @endif --}}
                            <li>
                                <a href="{{ route('category_item', $item->slug) }}">{{ $item->title }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <form class="search" method="GET" action="{{ route('search') }}">
                <input required name="search_input" type="text" placeholder="Поиск по рецептам" class="search-input"
                    @if (isset($_GET['search_input'])) value="{{ $_GET['search_input'] }}" @endif />
                <button type="submit">
                    <img loading="lazy" src="/content/icons/search.svg" alt="icon-search">
                </button>
            </form>
            <div class="log-box">
                {{-- <button class="btn-reset favourite" type="button">
                <svg data-name="Livello 1" id="Livello_1" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M125.48,56.91a8.88,8.88,0,0,0-5-15L88.33,37a2.85,2.85,0,0,1-2.15-1.62L72,5.11a8.84,8.84,0,0,0-16,0L41.82,35.4A2.85,2.85,0,0,1,39.67,37L7.52,41.95a8.88,8.88,0,0,0-5,15l23.63,24.3a2.9,2.9,0,0,1,.78,2.47l-5.53,34a8.85,8.85,0,0,0,13,9.19l28.21-15.65a2.81,2.81,0,0,1,2.75,0h0l28.21,15.65a8.85,8.85,0,0,0,13-9.19l-5.53-34a2.89,2.89,0,0,1,.78-2.47ZM95.16,84.65l5.53,34a2.82,2.82,0,0,1-1.18,2.82,2.77,2.77,0,0,1-3,.16L68.29,106h0a8.78,8.78,0,0,0-8.57,0L31.51,121.63a2.78,2.78,0,0,1-3-.16,2.82,2.82,0,0,1-1.18-2.82l5.53-34A8.92,8.92,0,0,0,30.45,77L6.82,52.73a2.84,2.84,0,0,1-.66-2.93,2.79,2.79,0,0,1,2.27-1.92l32.15-4.93a8.84,8.84,0,0,0,6.67-5L61.42,7.65a2.84,2.84,0,0,1,5.16,0l14.17,30.3a8.84,8.84,0,0,0,6.68,5l32.15,4.93a2.79,2.79,0,0,1,2.27,1.92,2.84,2.84,0,0,1-.66,2.93L97.55,77A8.92,8.92,0,0,0,95.16,84.65Z" />
                </svg>
                <span class="counter">0</span>
            </button> --}}
                @if (!empty(Auth::user()))
                    <a class="login" href="{{ route('personal.liked') }}/">
                        @if (Auth::user()->avatar)
                            <img loading="lazy" class="avatar" src="{{ asset(Auth::user()->avatar) }}"
                                alt="{{ Auth::user()->name }}">
                        @else
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: none;
                                        }
                                    </style>
                                </defs>
                                <title />
                                <g data-name="Layer 2" id="Layer_2">
                                    <path
                                        d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z" />
                                    <path d="M16,17a5,5,0,1,1,5-5A5,5,0,0,1,16,17Zm0-8a3,3,0,1,0,3,3A3,3,0,0,0,16,9Z"
                                        fill="#000" />
                                    <path
                                        d="M25.55,24a1,1,0,0,1-.74-.32A11.35,11.35,0,0,0,16.46,20h-.92a11.27,11.27,0,0,0-7.85,3.16,1,1,0,0,1-1.38-1.44A13.24,13.24,0,0,1,15.54,18h.92a13.39,13.39,0,0,1,9.82,4.32A1,1,0,0,1,25.55,24Z"
                                        fill="#000" />
                                </g>
                                <g id="frame">
                                    <rect class="cls-1" height="32" width="32" />
                                </g>
                            </svg>
                        @endif
                        {{-- {{ Auth::user()->name }} --}}
                    </a>
                    <a class="login" href="{{ route('logout') }}/">Выйти</a>
                @else
                    <a href="{{ route('logout') }}/">
                        Войти
                        <svg data-name="Layer 2" id="a5b81eaf-55c4-41bd-86f3-06b0f5373971" viewBox="0 0 35 35"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.052,34.75a1.25,1.25,0,0,1,0-2.5,14.75,14.75,0,0,0,0-29.5,1.25,1.25,0,0,1,0-2.5,17.25,17.25,0,0,1,0,34.5Z" />
                            <path d="M19.626,18.75H1.947a1.25,1.25,0,1,1,0-2.5H19.626a1.25,1.25,0,1,1,0,2.5Z"
                                fill="#000" />
                            <path
                                d="M13.234,26.438A1.25,1.25,0,0,1,12.35,24.3l6.384-6.385a.593.593,0,0,0,0-.839L12.35,10.7a1.25,1.25,0,1,1,1.767-1.768L20.5,15.313a3.1,3.1,0,0,1,0,4.374l-6.385,6.385A1.246,1.246,0,0,1,13.234,26.438Z"
                                fill="#000" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
        <div class="container-header">
            <ul class="list-reset category-list">
                @foreach ($categories_menu as $item)
                    @if ($item->posts->count())
                        {{-- @if ($item->title === 'Пасха')
                        @continue
                    @endif --}}
                        <li class="category-list__item">
                            <a href="{{ route('category_item', $item->slug) }}">{{ $item->title }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </header>
