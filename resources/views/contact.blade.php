<!DOCTYPE html>
<html lang="ru" class="page">
@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            <section class="about_content">
                <div class="content">
                    <h1>Задать вопрос</h1>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <textarea id="message" name="message" class="form-control" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>

                </div>
                <section class="aside">
                    <aside>
                        <ul>
                            <li>
                                <a href="https://infonickweb.ru/" target="_blank">
                                    <h4 style="text-align: center">Разработка сайтов</h4>
                                    <img lazy="loading" src="{{ asset('assets/base/site.png') }}"
                                        alt="Разработка сайтов">
                                    <p>Оригинальный дизайн и чистый валидный код, адаптированы под любые устройства и
                                        SEO</p>
                                </a>
                            </li>
                            @env('local')
                            <li>

                                <!-- Yandex.RTB R-A-2349463-13 -->
                                <div id="yandex_rtb_R-A-2349463-13"></div>
                                <script>
                                    window.yaContextCb.push(() => {
                                        Ya.Context.AdvManager.render({
                                            "blockId": "R-A-2349463-13",
                                            "renderTo": "yandex_rtb_R-A-2349463-13"
                                        })
                                    })
                                </script>
                            </li>
                            @endenv
                        </ul>
                    </aside>
                </section>
            </section>
        </main>
        <section class="links">
            <div class="container"></div>
        </section>
        @include('Main.footer')
    </div>
</body>

</html>
