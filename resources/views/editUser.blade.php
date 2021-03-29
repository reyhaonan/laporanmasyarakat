<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard Pengaduan</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
            width: 23%;
            height: 100%;
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
            background-color: #979797
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
        .content {
            position: absolute;
            left: 350px;
            top: 70px;
            font-weight: bold;
            color: white;
            font-size: 30px;
        }
        .logout {
            position: absolute;
            right: 100px;
        }
        .logout button {
            background-color: #FF6C6C;
            height: 30px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: white;
        }
        form {
            position: absolute;
            top: 130px;
            left: 350px;
        }
        .editnama {
            color: white;
            font-weight: bold;
        }
        .editUsername {
            color: white;
            font-weight: bold;
        }
        .editTelp {
            color: white;
            font-weight: bold;
        }
        .editNIK {
            position: absolute;
            left: 400px;
            top: 0px;
            color: white;
            font-weight: bold;
        }
        .editAlamat {
            position: absolute;
            left: 400px;
            top: 80px;
            color: white;
            font-weight: bold;
        }
        textarea {
            background-color: #54526B;
            border: none;
            border-radius: 4px;
            width: 346px;
            height: 110px;
            color: white;
            font-family: "Ubuntu", sans-serif;
            font-weight: bold;
        }
        input {
            background-color: #54526B;
            border: none;
            border-radius: 4px;
            width: 346px;
            height: 30px;
            color: white;
            font-family: "Ubuntu", sans-serif;
            font-weight: bold;
        }
        .submit {
            background-color: #68DB65;
            border: none;
            border-radius: 4px;
            height: 30px;
            width: 120px;
            color: white;
            font-weight: bold;
            position: absolute;
            top: 300px;
            left: 100%;
        }
        </style>
    </head>
    <body>

        <div class="shape"><p class="titletext">ADMINISTRATOR</p>
        <hr>
            <div class="adminpic" style="{{'background-image:url('.asset('storage/'.Auth::user()->foto).')'}}"></div>
            <p class="username">Selamat datang,<br><span id="logged-in-user">{{Auth::user()->nama}}</span></p> <!-- logged-in-user buat nama adminnya btw -->
            <a href="/dashboard"><p class="text1">Dashboard</p></a>
            <a href="/dashboard/petugas"><p class="text2">Data Petugas</p></a>
            <a href="/dashboard/masyarakat"><p class="text3">Data Masyarakat</p></a>
            <a href="/dashboard/pengaduan"><p class="text4">Data Pengaduan</p></a>
            <a href="/dashboard/tanggapan"><p class="text5">Data Tanggapan</p></a>
        </div>
        <div class="content">Edit Data</div>
            <form action="{{'/user/update/'.$user->id}}" method="POST">
                @csrf
                <div class="editnama">
                    <p>Nama</p>
                    <input type="text" name="nama" value="{{$user->nama}}" required>
                </div>
                <div class="editUsername">
                    <p>Username</p>
                    <input type="text" name="username" value="{{$user->username}}" required>
                </div>
                <div class="editTelp">
                    <p>Nomor Telepon</p>
                    <input type="text" name="notelp" value="{{$user->notelp}}" required>
                </div>
                <div class="editNIK">
                    <p>NIK</p>
                    <input type="text" name="nik" value="{{$user->nik}}" required>
                </div>
                <div class="editAlamat">
                    <p>Alamat</p>
                    <textarea rows="4" class="textpengaduan" name="alamat">{{$user->alamat}}</textarea>
                </div>
                <input class="submit" type="submit" value="Konfirmasi Edit">
            </form>
        <div class="page">
            <a class="triangle-right"></a>
        </div>
        </body>
</html>
