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
                background-color: #d3d6dd;
                color: #fafcfe;
                font-family: 'Roboto', sans-serif;
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

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 160px;
            }

            .links > a {
                color: #fafcfe;
                padding: 10px 10px;
                margin: 16px;
                font-size: 20px;
                text-decoration: none;
            }

            .links a:hover {
                border: 1px solid;
            }
            
            .m-b-md {
                margin-bottom: 40px;
            }
            
            p {
                color: #fafcfe;
            }
        </style>
    </head>
    
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <p>日常管理アプリ</p>
                <div class="title m-b-md">
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
