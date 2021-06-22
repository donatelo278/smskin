<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap_rename.css" rel="stylesheet">
    <title>Тестовое</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
{{--                <a class="navbar-brand" href="#">Navbar</a>--}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link {{ (Request::is(['/']) ? 'active' : null) }}" aria-current="page" href="{{ route('public_main') }}">Главная страница</a>
                        <a class="nav-link {{ (Request::is(['/articles*']) ? 'active' : null) }}" aria-current="page" href="{{ route('article') }}">Каталог статей</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @stack('script-shared')
</body>
</html>
