<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>hibi</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Roboto', sans-serif;
                background-color: #d3d6dd;
                color: #8da0b6;
                height: 100vh;
                margin: 0;
            }
            
            .full-height {
                height: 100vh;
            }
            
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            
            .content {
                text-align: center;
                background-color: #fafafa;
                opacity: 0.4;
                padding: 100px 40px;
            }
            
            .title {
                font-size: 140px;
                margin-bottom: 40px;
            }
            
            .links > a {
                color: #8da0b6;
                font-size: 20px;
                padding: 10px 10px;
                margin: 10px;
                text-decoration: none;
            }
            
            .links a:hover {
                border: 1px solid;
            }
            
            p {
                margin-top: 0px;
            }
        </style>
    </head>
    
    <body>
        <div class="full-height flex-center">
            <div class="content">
                <p>日常管理アプリ</p>
                <div class="title">
                    hibi
                </div>

                @if (Route::has('login'))
                    <div class="links">
                        @auth
                            <a href="{{ url('user/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">ログイン</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">新規登録</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
