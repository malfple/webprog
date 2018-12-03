<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/stylesheet.css')}}">
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
                            <a href="/myPosts">My Post</a>
                            <a href="/followedPosts">Followed Posts</a>
                            <a href="#">Change Followed Categories</a>
                            <a href="/transactionHistory">Transaction History</a>
                            @can('isAdmin')
                                <a href="#">Manage User</a>
                                <a href="#">Manage Category</a>
                                <a href="#">View All Transactions</a>
                            @endcan
                            <a href="/cart">Cart</a>
                            <a class="username"href="/profile">{{Auth::user()->user_name}}</a>
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