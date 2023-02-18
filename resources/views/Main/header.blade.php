
<header class="header">
    <div class="container">
      <a href="/" class="logo">Con Gusto</a>
      <nav>
        <ul class="reset-list">
          @foreach ($headers as $header_item)
          <li>
            <a href=" {{  $header_item->link }}">{{ $header_item->title }}</a>
          </li>
          @endforeach
        </ul>
      </nav>
      <form class="search" method="GET" action="{{ route('search') }}">
        <input required name="s" type="text" placeholder="Поиск по рецептам" class="search-input @error('s') is-invalid @enderror " />
        <button type="submit">Поиск</button>
      </form>
      <div class="log-box">
        @if ( !empty(Auth::user()))
          <a href="{{route('logout')}}/">Вы вошли как: {{ Auth::user()->name }}</a>    
        @else
          <a href="{{route('logout')}}/">Войти / Зарегистрироваться</a>
        @endif        
          <a href="#"></a>
      </div>
    </div>
  </header>
    