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
            .adminbutton {
                font-size: 18px;
                margin-left: 480px;
                width: 157px;
                height: 34px;
            }
            .civilbutton {
                font-size: 18px;
                margin-left: 50px;
                width: 157px;
                height: 34px;
            }
            .text {
                text-align: center;
                margin-top: 250px;
            }
        </style>
    </head>
    <body>
        <div>
            <p class="text"> Masuk atau Daftar sebagai... </div></p>
                <div>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <button class="adminbutton" type="button"> <a href="{{ route('login') }}">Pegawai</a> </button>

                        @if (Route::has('register'))
                        <button class="civilbutton" type="button"><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Masyarakat</a></button>
                        @endif
                    @endauth
                </div>
        </div>
    </body>
</html>
