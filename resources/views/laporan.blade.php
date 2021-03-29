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
        table{
            position: absolute;
            top: 120px;
        }
        td {
            padding: 10px;
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
        
        </style>
        <script type="text/javascript">

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

</script>
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
                <p>AJUKAN PENGADUAN</p>
                <table>
                <tr>
                    <td>Pengaduan</label></td>
                    <td><textarea rows="4" class="textpengaduan"></textarea></td>
                </tr>
                <tr>
                    <td>Foto</label></td>
                    <td><input id="uploadImage" type="file" name="myPhoto" onchange="PreviewImage();"></td>
                </tr>
                <tr>
                    <td><img class="preview" id="uploadPreview" style="width: 100px; height: 100px;" /></td>
                </tr>
                </table>
                <input class="submit" type="submit" value="Ajukan">
        </div>
        <div class="square1"></div>
        <div class="square2"></div>
    </body>
</html>
