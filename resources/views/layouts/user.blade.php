<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title')</title>
        
        <!-- Scripts:Laravel標準で用意されているJavascriptを読み込みます -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <!-- Fonts: -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" type="text/css">
        <!-- Styles:Laravel標準で用意されているCSSを読み込みます -->
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <!-- Styles:css/userを読み込みます-->
        <link rel="stylesheet" href="{{ secure_asset('css/user.css') }}">
    </head>
    
    <body>
        <div id="app">
            <nav  class="navbar navbar-expand-md">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        hibi
                    </a>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
