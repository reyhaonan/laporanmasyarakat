<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laporan masyarakat</title>


        <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
            body {
                background-color: #313040;
                overflow: hidden;
            }
            .adminbutton {
                margin-left: 480px;
            }
            .adminbutton:hover {
                background-color: #247BB9;
            }
            .civilbutton {
                margin-left: 50px;
            }
            .civilbutton:hover {
                background-color: #247BB9;
            }
            .text {
                font-family: 'Ubuntu', sans-serif;
                text-align: center;
                margin-top: 250px;
                font-weight: 650;
                color: white;
            }
            .square1 {
                position: absolute;
                left: -100px;
                bottom: -125px;
                height: 400px;
                width: 400px;
                border: 8px solid #555;
                border-radius: 65px;
                fill: none;
                border-color: #54526B;
            }
            .square2 {
                position: absolute;
                left: -100px;
                bottom: -200px;
                height: 400px;
                width: 490px;
                border: 8px solid #555;
                border-radius: 65px;
                fill: none;
                border-color: #54526B;
            }
            button {
                font-family: 'Ubuntu', sans-serif;
                font-size: 18px;
                margin-left: 480px;
                width: 157px;
                height: 34px;
                border: none;
                border-radius: 4px;
                background: #1d8fe0;
                text-decoration: none;
                font-weight: 500;
                color: #EAEAEA;
            }
        </style>
    </head>
    <body>
        <div>
            <p class="text"> Lanjut sebagai... </div></p>
                <div>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <button class="adminbutton" type="button" onclick="window.location='{{ route('login') }}'">Administrator</button>

                        @if (Route::has('register'))
                        <button class="civilbutton" type="button" onclick="window.location='{{ route('register') }}'">Masyarakat</button>
                        @endif
                    @endauth
                </div>
        </div>
        <div class="square1"></div>
        <div class="square2"></div>
    </body>
</html>
