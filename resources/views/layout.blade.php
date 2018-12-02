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
                    <a href="home.html">Home</a>
                    <a href="#">My Post</a>
                    <a href="loginForm.html">Login</a>
                    <a href="registerForm.html">Register</a>
                    <b href="profilePage.html">LoliHeaven</a>
                </ul>
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </body>
</html>