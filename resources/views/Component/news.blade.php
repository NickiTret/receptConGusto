<section class="news">
    <div class="container">
        <div class="content-box">
            <div class="content-header">
                <picture>
                    @if (!empty($data->thumbnail))
                        <img src="/{{ $data->thumbnail }}" alt="photo">
                    @else
                        <img src="/{{ $data->image }}" alt="photo">
                    @endif
                </picture>
                <h1>
                    {{ $data->title }}
                </h1>
                <h2>
                    {!! $data->description !!}
                </h2>
                <ul>
                    <li>Дата публикации: <span>{{ $data->created_at->format('d.m.Y') }}</span></li>
                    @if (!empty($data->views))
                    <li>Просмотрели: <span>{{ $data->views }}</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
