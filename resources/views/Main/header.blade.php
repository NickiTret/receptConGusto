
<header class="header">
    <div class="container">
      <a href="/" class="logo">Con Gusto</a>
      <nav style="display: none;">
        <ul class="reset-list">
          @foreach ($headers as $header_item)
          <li>
            <a href=" {{  $header_item->link }}">{{ $header_item->title }}</a>
          </li>
          @endforeach
        </ul>
      </nav>
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
    