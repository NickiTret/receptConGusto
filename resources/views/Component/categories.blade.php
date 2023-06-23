<section class="category">
    <div class="container">
        <h2>Категории</h2>
        <div class="content">
            <ul>
                @if (!empty($data))
                <li>
                    <a href="{{ route('marinade') }}">
                        <div>
                            <img loading="lazy" src="//cdn.optipic.io/site-104010/images/2023-05-31/hLMfaDZfeWR0Fu0sdiJsIHVFE2X4Daiq3OXS5oTA.jpg" alt="Коллекция маринадов">
                        </div>
                        <p>Коллекция маринадов</p>
                        <p class="category-description"><small>
                            Заранее подержите рыбу, мясо или морепродукты в маринад минимум 2 - 4 часа. После дайте маринаду хорошо стечь. Когда мясо почти готово, смажьте продукт остатками маринада, для вкусной и привлекательной корочки.
                        </small></p>
                    </a>
                </li>
                    @foreach ($data as $item)
                        @if ($item->posts->count() > 0)
                            <li>
                                <a href="{{ route('category_item', $item->slug) }}">
                                    <div>
                                        <picture>
                                            @if ($item->addImageFormat())
                                                <source type="image/avif" srcset="/{{ $item->addImageFormat()['imageAvif'] }}" />
                                                <source type="image/webp" srcset="/{{ $item->addImageFormat()['imageWebp'] }}" />
                                            @endif
                                            <img loading="lazy" title="{{ $item->title }}" alt="{{ $item->title }}"
                                                src="/{{ $item->addImageFormat()['imageDefault'] }}">

                                        </picture>
                                    </div>
                                    <p>{{ $item->title }}</p>
                                    @if (!empty($item->description))
                                    <p class="category-description"><small>{{ $item->description }}</small></p>
                                    @endif

                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</section>
