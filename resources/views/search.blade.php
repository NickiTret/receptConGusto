<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            <section class="search__nav">
                <div class="container">
                    <h2>Фильтр</h2>
                    <form action="{{ route('search') }}" method="get">
                        <input name="search_input" type="text" placeholder="Поиск по тексту"
                               class="search-input" @if(isset($_GET['search_input'])) value="{{$_GET['search_input']}}" @endif/>
                        <select class="default" name="category_id">
                            <option value="">Не выбрана категория</option>
                            @foreach($category as $category_item)
                                <option value="{{ $category_item->id }}" @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $category_item->id) selected @endif @endif>{{$category_item->title}}</option>
                            @endforeach
                        </select>
                        <button type="submit">Найти</button>
                    </form>
                </div>
            </section>
            @if (!empty($banner))
                @include('Component.banner', ['data' => $banner])
            @endif

            @if (!empty($posts))
                @include('Component.hits', ['posts' => $posts])
            @endif
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
