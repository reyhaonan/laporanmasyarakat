<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laporan masyarakat</title>


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .login {
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div>
                <div>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <div class="login"> <a href="{{ route('login') }}">Masuk</a> </div>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Daftar</a>
                        @endif
                    @endauth
                </div>
        </div>
    </body>
</html>
