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
        <title>{{ strip_tags($seo->title) }}</title>
        <meta name="description" content="{{ strip_tags($seo->description) }}">
        <meta property="og:title" content="{{ strip_tags($seo->title) }}">
        <meta property="og:description" content="{{ strip_tags($seo->description) }}">
        <meta name="twitter:card" content="summary_large_image" />
        <meta property="og:image" content="{{ asset($seo->image_page) }}" />
        <meta name="twitter:image" content="{{ asset($seo->image_page) }}" />
        <meta name="keywords" content="{{ strip_tags($seo->keywords) }}" />
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
            <meta property="og:description"
                content="Con gusto, рецепты, рецепты, домашняя еда по ресторанным рецептам {{ strip_tags($data->title) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @elseif (!empty($heros) || !empty($categories))
            <meta name="description"
                content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
            <meta property="og:description"
                content="Con gusto, рецепты, кулинарные истории, кулинария, вкусно и сытно | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @elseif (!empty($banner) && empty($data))
            <meta name="description"
                content="{{ strip_tags($banner->subtitle) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
            <meta property="og:description"
                content="{{ strip_tags($banner->subtitle) }} | Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
        @else
            <meta name="description"
                content="Con gusto, рецепты, домашняя еда по ресторанным рецептам. Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
            <meta property="og:description"
                content="Con gusto, рецепты, домашняя еда по ресторанным рецептам. Хотите приготовить? Узнайте советы, ингредиенты, время и способы приготовления наших вкусных классических рецептов.">
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


</head>
