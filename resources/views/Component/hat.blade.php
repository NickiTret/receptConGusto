@if (!empty($data))
    <section class="hat">
        @if (!empty($data->image))
            <div class="image">
                @php
                    $resizedImagePath = \App\Models\GeneralModel::resize(
                        705,
                        470,
                        $data->image,
                        100,
                    );
                    $resizedImagePath480 = \App\Models\GeneralModel::resize(
                        427,
                        284,
                        $data->image,
                        100,
                    );
                @endphp
                <picture>
                    <source media="(max-width: 480px)" srcset="{{ asset($resizedImagePath480) }}">

                    @if ($post->addImageFormat())
                        <source type="image/webp" srcset="/{{ $resizedImagePath }}" />
                    @endif

                    <img width="314" height="200" loading="lazy" title="{{ $post->title }}" alt="{{ $post->title }}"
                        src="/{{ $post->addImageFormat()['imageDefault'] }}">
                    {{-- <img loading="lazy" src="/{{ $data->image }}" alt="{{ $data->title }}"> --}}
                </picture>
            </div>
        @endif

        <div class="content">
            @if (!empty($data->title))
                <h1>{{ $data->title }}</h1>
            @else
                <h1>Поиск по параметрам</h1>
            @endif

            @if (!empty($data->content))
                <h3>{!! $data->content !!}</h3>
            @endif
        </div>
    </section>
@endif
