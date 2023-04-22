<section class="category">
    <div class="container">
        <h2>Категории</h2>
        <div class="content">
            <ul>
                @if (!empty($data))
                    @foreach ($data as $item)
                        @if ($item->posts->count() > 0)
                            <li>
                                <a href="{{ route('category_item', $item->slug) }}">
                                    <div>
                                        <img src="/{{ $item->image }}" alt="{{ $item->title }}">
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
