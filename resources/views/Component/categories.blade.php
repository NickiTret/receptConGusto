<section class="category">
    <div class="container">
        <h2>Категории</h2>
        <div class="content">
            <ul>
                <li>
                    <a href="{{  route('category_item',  $data[0]->id) }}">
                        <img src="{{$data[0]->image}}" alt="{{$data[0]->title}}">
                        <p>{{ $data[0]->title }}</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </section>