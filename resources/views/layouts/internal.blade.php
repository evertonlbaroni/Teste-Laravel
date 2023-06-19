<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste Laravel</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <main>
        <div class="container">
            <form action="/logout" class="logout" method="POST">
                {{ csrf_field() }}
                <button>Logout</button>
            </form>
            @yield('main')
            <script src="/js/app.js"></script>
            @yield('js')
        </div>
    </main>
</body>
</html>
