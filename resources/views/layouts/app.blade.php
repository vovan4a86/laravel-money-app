<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <header class="">
            <ul class="d-flex py-3 justify-content-center list-unstyled bg-dark">
                <li class="px-4">
                    <a href="/" class="text-white">Главная</a>
                </li>
                <li class="px-4">
                    <a href="/payments/incomes/all" class="text-white">Доходы</a>
                </li>
                <li class="px-4">
                    <a href="/payments/outcomes/all" class="text-white">Расходы</a>
                </li>
                <li class="px-4">
                    <a href="/" class="text-white">Отчеты</a>
                </li>
            </ul>
        </header>

        <div class="main w-75 mx-auto">
            @yield('content')
        </div>

{{--        <footer class="py-3 bg-black text-white">--}}
{{--            <div class="text-center">Copyright 2022</div>--}}
{{--        </footer>--}}
    </div>
</body>
</html>
