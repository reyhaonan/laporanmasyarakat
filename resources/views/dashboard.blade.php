<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard Pengaduan</title>

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
        body {
            background-color: #313040;
            font-family: 'Ubuntu', sans-serif;
        }
        .shape {
            overflow: hidden;
            position: absolute;
            left: -10px;
            top: -10px;
            width: 330px;
            height: 667px;
            background-color: #25252E;
        }
        .titletext {
            margin-left: 30px;
            margin-top: 30px;
            font-weight: 750;
            font-size: 25px;
            color: white;
        }
        hr {
            margin-top: -10px;
        }
        .adminpic {
            margin-left: 30px;
            margin-top: 10px;
            display: inline-block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-image: url('http://placehold.it/400x200');
        }
        .username {
            color: white;
            margin-left: 150px;
            margin-top: -80px;
        }
        .text1 {
            position: absolute;
            left: 30px;
            top: 230px;;
            font-weight: bold;
            color: white;
        }
        .text2 {
            position: absolute;
            left: 30px;
            top: 270px;;
            font-weight: bold;
            color: white;
        }
        .text3 {
            position: absolute;
            left: 30px;
            top: 310px;;
            font-weight: bold;
            color: white;
        }
        .text4 {
            position: absolute;
            left: 30px;
            top: 350px;;
            font-weight: bold;
            color: white;
        }
        .text5 {
            position: absolute;
            left: 30px;
            top: 390px;;
            font-weight: bold;
            color: white;
        }
        .text6 {
            position: absolute;
            left: 30px;
            top: 430px;;
            font-weight: bold;
            color: white;
        }
        .content {
            position: absolute;
            left: 350px;
            top: 70px;
            font-weight: bold;
            color: white;
            font-size: 30px;
        }
        .pengaduan1 {
            position: absolute;
            left: 350px;
            top: 150px;
            border-radius: 4px;
            background-color: #54526B;
            width: 900px;
            height: 150px;
        }
        .pengaduan1 h3 {
            color: white;
            margin-left: 20px;
            margin-top: 10px;
        }
        .pengaduan1 p {
            color: white;
            margin-left: 20px;
        }
        .pengaduan1 button {
            margin-left: 20px;
            margin-top: 15px;
            background-color: #68DB65;
            border-radius: 4px;
            border: none;
            height: 30px;
            font-weight: 750;
        }
        .pengaduan2 {
            position: absolute;
            left: 350px;
            top: 320px;
            border-radius: 4px;
            background-color: #54526B;
            width: 900px;
            height: 150px;
        }
        .pengaduan2 h3 {
            color: white;
            margin-left: 20px;
            margin-top: 10px;
        }
        .pengaduan2 p {
            color: white;
            margin-left: 20px;
        }
        .pengaduan2 button {
            margin-left: 20px;
            margin-top: 15px;
            background-color: #68DB65;
            border-radius: 4px;
            border: none;
            height: 30px;
            font-weight: 750;
        }
        </style>

        <div class="shape"><p class="titletext">ADMINISTRATOR</p>
        <hr>
            <div class="adminpic"></div>
            <p class="username">Selamat datang,<br><span id="logged-in-user"></span></p> <!-- logged-in-user buat nama adminnya btw -->
            <a href=""><p class="text1">Dashboard</p></a>
            <a href=""><p class="text2">Data Petugas</p></a>
            <a href=""><p class="text3">Data Member</p></a>
            <a href=""><p class="text4">Data Pengaduan</p></a>
            <a href=""><p class="text5">Data Tanggapan</p></a>
            <a href=""><p class="text6">Laporan</p></a>
        </div>
        <div class="content">Dashboard</div>
            <div class="pengaduan1">
                <h3> Pengaduan dari Andrius</h3><hr> <!-- nama hanya placeholder -->
                <p>Tetangga saya main Genshin party-nya full bintang 5, haruskah saya top-up?</p>
                <button type="button">Tanggapi</button>
            </div>
            <div class="pengaduan2">
                <h3> Pengaduan dari Hu Tao</h3><hr> <!-- nama hanya placeholder -->
                <p>Apakah Hu Tao Physical Build efektif?</p>
                <button type="button">Tanggapi</button>
            </div>
        </body>
</html>