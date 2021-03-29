<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laporan masyarakat</title>
        <style>
        body {
            overflow: hidden;
            background-color: #313040;
            font-family: 'Ubuntu', sans-serif;
        }
        .titletext {
            margin-left: 30px;
            margin-top: 30px;
            font-weight: 750;
            font-size: 25px;
            color: white;
        }
        ul{
            position: absolute;
            left: 45%;
            margin-top: -45px;
            float: right;
        }
        li{
	        display: inline;
            padding: 0 20px;
        }
        li a{
            text-decoration: none;
            color: white;
        }
        .login {
            position: absolute;
            left: 90%;
            margin-top: -45px;
        }
        .login a {
            background-color: #68DB65;
            height: 30px;
            width: 100px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            padding: 5px 12px;
        }
        .signin {
            position: absolute;
            left: 80%;
            margin-top: -45px;
        }
        .signin a {
            background-color: #68DB65;
            text-decoration: none;
            padding: 5px 12px;
            height: 30px;
            width: 100px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: white;
        }
        img {
            position: absolute;
            top: 26%;
            left: 45%;
            height: 30%;
        }
        h2 {
            margin-top: 23%;
            color: white;
            text-align: center;
        }
        .desc {
            color: white;
            text-align: center;
        }
        .square1 {
            position: absolute;
            left: -100px;
            bottom: -125px;
            height: 400px;
            width: 370px;
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
            width: 450px;
            border: 8px solid #555;
            border-radius: 65px;
            fill: none;
            border-color: #54526B;
            }

            .logout button{
                background-color: #e75353;
                text-decoration: none;
                padding: 5px 12px;
                height: 30px;
                width: 100px;
                border: none;
                border-radius: 4px;
                font-weight: bold;
                color: white;
            }

            .ajukan{
                background-color: #e0e0e0;
                text-decoration: none;
                padding: 8px 12px;
                height: 30px;
                width: 100px;
                border: none;
                border-radius: 4px;
                font-weight: bold;
                color: black;
                margin-left: 45%
            }
        </style>
    </head>
    <body>
        <p class="titletext">Pengaduan Masyarakat</p>
        @auth()
            <div class="login logout">
                <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
                <button type="submit" form="logout">Log Out</button>
            </div>
        @endauth
        @guest
            <div class="signin">
                <a type="a" href="/register">Daftar</a>
            </div>
            <div class="login">
                <a type="a" href="/login">Masuk</a>
            </div>
        @endguest
        <img src="logo.png">
        <h2>Aplikasi Pengaduan<br>SMK NEGERI 2 PURWAKARTA</h2>
        <p class="desc">Silakan sampaikan keluhan anda dan kami akan melayani anda dengan sepenuh hati</p>
        <a href="{{ Auth::check()? '/lapor': 'login' }}" class="ajukan">Ajukan Pengaduan</a>
        <div class="square1"></div>
        <div class="square2"></div>
    </body>
</html>
