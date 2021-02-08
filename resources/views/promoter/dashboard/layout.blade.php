<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/grid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
</head>
<body style="background-color: #FFF">
    <header>
        <div class="rd-container full">
            <div class="rd-element rd-s-100 rd-m-100 rd-l-70 rd-lg-70 rd-xl-70">
                <h2>Buen día {{ session('promoter_name')}}</h2>
            </div>
            <div class="rd-element rd-s-100 rd-m-100 rd-l-30 rd-lg-30 rd-xl-30">
                <p class="t-right"><a href="{{ route('promoter.logout') }}">Cerrar sesión</a></p>
            </div>
        </div>
    </header>
    @yield('content')
</body>
</html>