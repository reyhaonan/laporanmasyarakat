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
        .login {
            position: absolute;
            left: 90%;
            margin-top: -45px;
        }
        .login a {
            background-color: #68DB65;
            height: 30px;
            width: 100px;
            padding: 10px 14px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: white;
        }
        .signin {
            position: absolute;
            left: 80%;
            margin-top: -45px;
        }
        .signin a {
            background-color: #68DB65;
            height: 30px;
            width: 100px;
            padding: 10px 14px;
            text-decoration: none;
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
        .pengajuan {
            position: absolute;
            left: 43%;
            margin-top: 10px;
        }
        .pengajuan a {
            background-color: #68DB65;
            height: 30px;
            width: 200px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            padding: 10px 20px
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
        <div class="pengajuan">
            <a href="{{ Auth::check()? '/lapor': 'login' }}" class="ajukan">Ajukan Pengaduan</a>
        </div>
        <div class="square1"></div>
        <div class="square2"></div>
    </body>
</html>
