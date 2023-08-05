{{ Request::header('Content-Type : text/xml') }}

<rss xmlns:yandex="http://news.yandex.ru"
     xmlns:media="http://search.yahoo.com/mrss/"
     xmlns:turbo="http://turbo.yandex.ru"
     version="2.0">
    <channel>
        @foreach ($newposts as $item)
            {!! $item !!}
        @endforeach
    </channel>
</rss>
