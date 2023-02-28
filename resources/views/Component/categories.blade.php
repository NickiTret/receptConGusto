<section class="category">
    <div class="container">
        <h2>Категории</h2>
        <div class="content">
            <ul>
                @if (!empty($data))
                    @foreach ($data as $item)
                        <li>
                            <a href="{{ route('category_item', $item->id) }}">
                                <div>
                                    <img src="/{{ $item->image }}" alt="{{ $item->title }}">
                                </div>
                                <p>{{ $item->title }}</p>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</section>
