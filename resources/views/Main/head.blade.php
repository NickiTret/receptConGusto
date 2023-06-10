<head lang="ru">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <meta name="yandex-verification" content="3519ed7046470147" />
    <title>Con gusto @if (!empty($data))- {{ strip_tags($data->title) }} @elseif (!empty($banner) && empty($data))- {{ strip_tags($banner->title) }}@endif
    </title>
    @if (!empty($data->description))
    <meta name="description" content="{{ strip_tags($data->description) }}">
    @elseif (!empty($data->title))
    <meta name="description" content="Con gusto, рецепты, рецепты, домашняя еда по ресторанным рецептам {{ strip_tags($data->title) }}">
    @elseif (!empty($heros) || !empty($categories))
    <meta name="description" content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно">
    @elseif (!empty($banner) && empty($data))
    <meta name="description" content="{{ strip_tags( $banner->subtitle ) }}">
    @else
    <meta name="description" content="Con gusto, рецепты, домашняя еда по ресторанным рецептам">
    @endif
    <meta name="twitter:card content="summary_large_image" />
    @if (!empty($post->thumbnail))
    <meta property=”og:image” content="{{asset($post->thumbnail)}}"/>
    <meta name="twitter:image" content="{{asset($post->thumbnail)}}" />
    @elseif (!empty($banner) && empty($data))
    <meta property=”og:image” content="{{asset($banner->image)}}"/>
    <meta name="twitter:image" content="{{asset($banner->image)}}" />
    @elseif (!empty($category_item) && empty($post->thumbnail))
    <meta property=”og:image” content="{{asset($category_item->image)}}"/>
    <meta name="twitter:image" content="{{asset($category_item->image)}}" />
    @elseif (!empty($data->image))
    <meta property=”og:image” content="{{asset($data->image)}}"/>
    <meta name="twitter:image" content="{{asset($data->image)}}" />
    @endif
    <link rel="icon" href="{{ asset('css/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/main/main.style.min.css') }}?110" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Yandex Native Ads -->
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


</head>
