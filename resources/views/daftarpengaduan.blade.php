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
        .login button {
            background-color: #68DB65;
            height: 30px;
            width: 100px;
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
        .signin button {
            background-color: #68DB65;
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
        .pengajuan {
            position: absolute;
            left: 43%;
            margin-top: 10px;
        }
        .pengajuan button {
            background-color: #68DB65;
            height: 30px;
            width: 200px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: white;
        }
        .formlaporan {
            margin-left: 30%;
            color: white;
        }
        .formlaporan p {
            position: absolute;
            left: 600px;
            font-weight: bold;
            font-size: 20px;
        }
        .textpengaduan {
            width: 400px;
            height: 75px;
            background: #54526B;
            border: none;
            border-radius: 4px;
            color: white;
            font-family: "Ubuntu", sans-serif;
        }
        table {
            background-color: #54526B;
            position: absolute;
            top: 130px;
            left: 22%;
            border-radius: 4px;
            text-align: center;
            width: 60%;
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
        .preview {
            position: absolute;
            top: 150px;
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
            top: 400px;
            left: 47%;
        }
        .pic1 {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 4px;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-image: url('http://placehold.it/400x200');
        }
        .page {
            position: absolute;
            right: 150px;
            top: 90%;
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
        
        </style>
    </head>
    <body>
        <p class="titletext">Pengaduan Masyarakat</p>
        <div class="signin">
            <button type="button" href="">Daftar</button>
        </div>
        <div class="login">
            <button type="button" href="">Masuk</button>
        </div>
        <div class="formlaporan">
                <p>DAFTAR PENGADUAN</p>
                <table>
            <tr>
                <th>Foto</th>
                <th>Tanggal</th>
                <th>Isi Pengaduan</th>
                <th>Status</th>
            </tr>
            <tr>
                <td><div class="pic1"></div></td>
                <td>DD / MM / YYYY</td>
                <td>thisisaplaceholder</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">Respon tanggapan akan berada disini</td>
            </tr>
            <tr>
                <td><div class="pic1"></div></td>
                <td>DD / MM / YYYY</td>
                <td>thisisaplaceholder</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">Respon tanggapan akan berada disini</td>
            </tr>
            <tr>
                <td><div class="pic1"></div></td>
                <td>DD / MM / YYYY</td>
                <td>thisisaplaceholder</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">Respon tanggapan akan berada disini</td>
            </tr>
            <tr>
                <td><div class="pic1"></div></td>
                <td>DD / MM / YYYY</td>
                <td>thisisaplaceholder</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">Respon tanggapan akan berada disini</td>
            </tr>
            </table>
        </div>
        <div class="page">
            <a href="" class="triangle-left"></a><p>1</p><a href="" class="triangle-right"></a>
        </div>
        <div class="square1"></div>
    </body>
</html>
