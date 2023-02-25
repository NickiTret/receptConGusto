<section class="aside">
    <aside>
        <ul>
            @foreach ($posts as $post)
            <li>
                <a href="{{  route('single',  $post->id) }}">
                    <h4>{{$post->title}}</h3>
                    <div class="disabled">
                        <img src="/{{$post->thumbnail}}" alt="{{$post->title}}">
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </aside>
</section>