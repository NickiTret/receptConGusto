{{ Request::header('Content-Type : text/xml') }}

<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:georss="http://www.georss.org/georss">
    <channel>
        @foreach ($newposts as $item)
            {{ print_r($item) }}
        @endforeach
    </channel>
</rss>