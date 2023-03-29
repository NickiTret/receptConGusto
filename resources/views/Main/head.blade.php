<head lang="ru">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#111111">
    <meta name="yandex-verification" content="3519ed7046470147" />
    <title>Con gusto @if (!empty($data))
            - {{ $data->title }}
        @endif
    </title>
    @if (!empty($data->description))
        <meta name="description" content="{{ $data->description }}">
    @elseif (!empty($data->title))
        <meta name="description"
            content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно {{ $data->title }}">
    @endif
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/main/main.style.min.css') }}?01" rel="stylesheet">
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
</head>
