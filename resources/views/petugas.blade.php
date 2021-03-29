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
        table {
            background-color: #54526B;
            position: absolute;
            top: 160px;
            left: 350px;
            border-radius: 4px;
            text-align: center;
            width: 66%;
            border-collapse: collapse;
            color: white;
        }
        th {
            border: 5px solid #313040;
            padding: 8px;
        }
        td {
            border: 5px solid #313040;
            border-radius: 10px;
            padding: 5px;
        }
        .page {
            position: absolute;
            right: 150px;
            top: 550px;
            font-size: 16px;
            color: white;
        }
        .triangle-right {
            position: absolute;
            left: 30px;
            bottom: 10px;
	        width: 0;
	        height: 0;
	        border-top: 15px solid transparent;
	        border-left: 25px solid white;
	        border-bottom: 15px solid transparent;
            border-radius: 6px;
        }
        .triangle-left {
            position: absolute;
            right: 30px;
            bottom: 10px;
	        width: 0;
	        height: 0;
	        border-top: 15px solid transparent;
	        border-right: 25px solid white;
	        border-bottom: 15px solid transparent;
            border-radius: 6px;
        }
        form {
            color: white;
            position: absolute;
            left: 350px;
            top: 120px;
        }
        .textpassword {
            display: inline-block
            /* position: absolute;

            left: 340px;
            top: -10px; */
        }
        .textname {
            display: inline-block
            /* position: absolute;

            left: 83px;
            top: -10px; */
        }
        .textusrnm {
            display: inline-block
            /* position: absolute;

            left: 0px;
            top: -10px; */
        }
        .input {
            display: inline-block;
        }
        .submit {
            width: 200px;
            height: 30px;
            background-color: #68DB65;
            border: none;
            border-radius: 4px;
            color: white;

        }
        .inputpass {
            background-color: #54526B;
            border: none;
            border-radius: 4px;
            width: 170px;
            height: 30px;
        }
        .inputname {
            background-color: #54526B;
            border: none;
            border-radius: 4px;
            width: 170px;
            height: 30px;
        }
        .inputusrnm {
            background-color: #54526B;
            border: none;
            border-radius: 4px;
            width: 170px;
            height: 30px;
        }
        .edit {
            background-color: #68DB65;
            height: 30px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: white;
        }
        .delete {
            background-color: #FF6C6C;
            height: 30px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: white;
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
        <div class="content">Petugas</div>
        <form action="/user/create" method="POST">
            @csrf
            <div class="textname">
                <label>Nama Lengkap</label>
                <input class="inputname" type="text" name="nama">
            </div>
            <div class="textusrnm">
                <label>Username</label>
                <input class="inputusrnm" type="text" name="username">
            </div>
            <div class="textpassword">
                <label>Password</label>
                <input class="inputpass" type="text" name="password">
            </div>
            <div class="input">
                <input class="submit" type="submit" value="Tambahkan">
            </div>
        </form>
        <div class="table">
            <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
            @php
                $i = 1
            @endphp
            @foreach ($petugas as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->username}}</td>
                <td><a href="{{'/user/edit/'.$item->id}}" class="edit">Edit</a>    <button type="submit" class="delete" form="{{'del'.$item->id}}">Hapus</button>
                    <form action="{{'/user/delete/'.$item->id}}" id="{{'del'.$item->id}}" method="post">@csrf</form></td>
            </tr>
            @php
                $i++
            @endphp
            @endforeach
            </table>
        </div>
        <div class="logout">
            <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
            <button type="submit" form="logout">Log Out</button>
        </div>
        <div class="page">
            <a href="" class="triangle-left"></a><p>1</p><a href="" class="triangle-right"></a>
        </div>
        </body>
</html>
