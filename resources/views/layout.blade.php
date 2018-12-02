<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="navbar">
            <div class="navbar-left">
                <ul>
                    <a class="logo">Pintester</a>
                    <input class="input" type="text"   placeholder="Search here">
                </ul>
            </div>
            <div class="navbar-right">
                <ul>
                    <a href="/">Home</a>
                    @if(Auth::check())
                        <a href="#">My Post</a>
                        <a href="#">Post Detail</a>
                        <b href="/profile">{{Auth::user()->user_name}}</b>
                        <a href="/logout">Logout</a>
                    @else
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    @endif
                </ul>
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </body>
</html>