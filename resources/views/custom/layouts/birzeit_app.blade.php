<html>
    <head>
        <title>Birzeit</title>
    </head>
    <body>
        <div>
            @auth
                <h2>User is logged in</h2>
            @endauth
            @guest
                Welcome to guest
            @endguest
        </div>
        @yield('content')
    </body>
</html>