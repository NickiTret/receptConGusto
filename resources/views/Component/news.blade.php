<section class="news">
    <div class="container">
        <div class="content-box">
            <div class="content-header">
                <picture>
                    @if ($data->addImageFormat())
                        {{-- <source type="image/avif" srcset="/{{ $data->addImageFormat()['imageAvif'] }}" /> --}}
                        <source type="image/webp" srcset="/{{ $data->addImageFormat()['imageWebp'] }}" />
                    @endif
                    <img loading="lazy" title="{{ $data->title }}" alt="{{ $data->title }}"
                        src="/{{ $data->addImageFormat()['imageDefault'] }}">

                </picture>
                <h1>
                    {{ $data->title }}
                </h1>

                {!! $data->description !!}

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
