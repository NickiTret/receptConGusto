<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header', ['headers' => $headers])
    <div class="site-container">
        <main>
            @include('Component.hat', ['data' => $hat])    
        </main>
        @include('Main.footer', ['headers' => $headers])
    </div>
</body>

</html>
