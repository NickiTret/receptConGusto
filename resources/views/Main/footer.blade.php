<footer class="footer">
    <div class="container">
      <div class="left-box">
        <a href="/" class="">
          Con Gusto
        </a>
        <p>© Copyright 2023 | <a href="http://infonickweb.ru/" target="_blank">NICKWEB</a>
        </p>
      </div>
      <nav>
        <ul>
          @foreach ($headers as $header_item)
          <li>
            <a href=" {{  $header_item->link }}">{{ $header_item->title }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </footer>

  <script type="module" src="{{ asset('assets/js/main.js') }}"></script>
