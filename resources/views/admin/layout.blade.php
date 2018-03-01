<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" type="text/css">

    <title>{{$title ?? 'Laravel' }}</title>
</head>
<body>
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><a href="{{ route('admin') }}">Панель управления</a></h3>
        </div>


        <div class="list-group">
            <a class="list-group-item" href="#category" data-toggle="collapse" aria-expanded="false">Категории</a>
            <div class="collapse" id="category">
                <a class="list-group-item" href="{{ route('category.index') }}">Список <span class="badge">{{ App\Models\Category::count() }}</span></a>
                <a class="list-group-item" href="{{ route('category.create') }}">Добавить</a>
            </div>
            <a class="list-group-item" href="#">About</a>
            
                <a class="list-group-item" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                <div class="collapse" id="homeSubmenu">
                    <a class="list-group-item" href="#">Page</a>
                    <a class="list-group-item" href="#">Page</a>
                    <a class="list-group-item" href="#">Page</a>
                </div>
            <a class="list-group-item" href="#">Portfolio</a>
            <a class="list-group-item" href="#">Contact</a>
        </div>
    </nav>

    <div id="content">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>
            </div>
        </nav>

        @yield('content')
    </div>
</div>

</body>
<footer>
    <script src="{{ mix('/js/app.js') }}"></script>
</footer>
</html>
