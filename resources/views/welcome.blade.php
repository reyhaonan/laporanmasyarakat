@extends('layouts.app')
@section('title','Home')


@section('body')

@auth()
<div class="publicDashboard">
    @foreach ($pengaduan as $item)
        <div class="reportContainer" id="{{'report'.$item->id}}">
            <div class="reportBubble round">
                <h4 class="username black">{{$item->user->nama.'(anda)'}}</h4>
                <p class="date">{{$item->created_at->isoFormat('dddd, D MMMM Y h:m')}}</p>
                @isset($item->foto)
                    <img src="{{'/storage/'.$item->foto}}" class="reportImg round">
                @endisset
                {{$item->isi_laporan}}
            </div>
            <div class="pp" style="{{'background-image: url(/storage/'.$item->user->foto.')'}}"></div>
        </div>
        @isset($item->tanggapan)
        <div class="replyContainer">
            <div class="pp" style="{{'background-image: url(/storage/'.$item->tanggapan->petugas->foto.')'}}"></div>
            <div class="replyBubble round">
                <h4 class="username black">{{$item->tanggapan->petugas->nama}}</h4>
                <a href="{{'#report'.$item->id}}" class="info">Tanggapan dari laporan anda pada {{$item->created_at->isoFormat('dddd, D MMMM Y')}}</a>
                <p class="date">{{$item->tanggapan->created_at->isoFormat('dddd, D MMMM Y h:m')}}</p>
                {{$item->tanggapan->tanggapan}}
            </div>
        </div>
        @endisset
    @endforeach
</div>
@endauth
<div class="container">
    <div class="navbar">
        <img src="/smk.png" class="applogo">
        @guest()
            <a href="/login" class="login">Login</a>
            <a href="/register" class="register round">Register</a>
            @endguest
        @auth
            <button type="submit" class="logout round" form="logout">Logout</button type="submit">
            <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
        @endauth
    </div>
    <section class="s1">


        @guest
        <div class="leftText">
            <h1 class="black">Aplikasi laporan masyarakat</h1>
            <p>Laporkan kepada kami jika terdapat penyalahgunaan wewenang,
                <br>pelanggaran peraturan perundang-undangan atau kejadian merugikan
                <br>yang dilakukan oleh seseorang.</p>
        </div>
        @endguest

        <div class="formContainer">
            @guest()
                <div class="plsloginoverlay round">
                    <p><a href="/login">Login</a> untuk mulai mengajukan laporan</p>
                </div>
            @endguest
            <div class="form round">
                <h3 style="margin-bottom: 1rem" class="black">Tambahkan laporan</h3>
                <label for="foto" class="addFoto round" id="uploadLabel">
                    <p style="margin: auto;" id="uptext">+ Upload foto</p>
                    <img id="uploadPreview" class="uploadPreview round">
                </label>
                <input type="file" form="ajukan" name="foto" onchange="PreviewImage()" id="foto" hidden accept="image/*">
                <textarea name="isi_laporan" class="round" placeholder="Tulis isi laporan disini" form="ajukan" required></textarea>
                <button type="submit" form="ajukan" class="submitbtn round black">Kirim laporan</button>
                @auth
                <form action="/laporkan" method="POST" id="ajukan" enctype="multipart/form-data">@csrf</form>
                @endauth
            </div>
        </div>
    </section>

    <section class="s2">
        <div style="margin:auto 0">
            <div>
                <h3 class="heading black">Tentang aplikasi</h3>
                <p class="about">Selamat datang di aplikasi web Pengaduan Masyarakat.
                    <br>Aplikasi Pengaduan Masyarakat adalah aplikasi pengelolaan
                    <br>dan tindak lanjut pengaduan serta pelaporan sebagai salah satu sarana bagi masyarakat
                    <br>untuk melaporkan suatu kejadian atau permasalahan kepada pihak yang berwenang.
                </p>
            </div>

            <div class="faq">
                <h3 class="heading black">FAQ</h3>
                <p class="about">
                    <p class="q black">Q : Apakah bentuk respon yang diberikan kepada pelapor atas pengaduan yang disampaikan?</p>
                    <p class="a">A : Respon yang diberikan kepada pelapor berupa respon awal dan tindak lanjut pengaduan paling akhir sesuai dengan respon yang telah diberikan oleh pihak penerima pengaduan. Respon terkait dengan status/tindak lanjut pengaduan dapat dilihat dalam daftar pengaduan pada aplikasi.</p>

                    <p class="q black">Q : Berapa lama respon atas pengaduan yang telah disampaikan?</p>
                    <p class="a">A : Jawaban/respon atas pengaduan yang disampaikan wajib diberikan dalam kurun waktu paling lambat 7 hari terhitung sejak pengaduan diterima.</p>

                    <p class="q black">Q : Apakah pengaduan yang disampaikan akan selalu di respon?</p>
                    <p class="a">A : Pengaduan yang diberikan akan direspon dan tercantum dalam aplikasi ini dan akan terupdate secara otomatis sesuai dengan respon yang telah diberikan oleh pihak penerima pengaduan. Sebagai catatan, pengaduan akan lebih mudah ditindaklanjuti apabila memenuhi unsur pengaduan</p>

                    <p class="q black">Q : Apakah layanan pengaduan ini berbayar?</p>
                    <p class="a">A : Layanan aplikasi ini gratis dan tidak ada dipungut biaya apapun.</p>
                </p>
            </div>
        </div>
    </section>
</div>
@endsection




@section('style')
{{-- s1 &container --}}
<style>
    body{
        display: flex;
    }
    .applogo{
        height: 30px;
    }
    .container{
        height: 100vh;
        flex: 6;
        position: relative;
        overflow-y: auto
    }
    .replyContainer{
        display: flex;
        padding: 1rem 1rem;
        padding-right: 4rem;
    }
    .replyContainer .date{
        right: inherit;
        bottom: -1.2rem;
        left: 0;
        font-size: .8rem;
        text-align: left !important
    }
    .replyContainer .username{
        top: -1.5rem;
        right: inherit;
        left: 0;
    }
    .info{
        color: #fff;
        font-size: .7rem
    }
    .replyBubble{
        position: relative;
        background: #EB4E36;
        padding: 1rem 1.5rem;
        margin-left: .6rem;
        margin-top: 1.5rem;
        display: flex;
        flex-direction: column;
        margin-right: auto;
        color: #ffffff
    }
    .reportContainer{
        display: flex;
        padding: 1rem 1rem;
        padding-left: 4rem;
        padding-bottom: 2rem;
        border-left: 4px solid transparent;
    }
    .reportContainer:target{
        background: #eb4e3623;
        border-left: 4px solid #eb4e36
    }
    .reportBubble{
        position: relative;
        background: #fff;
        padding: 1rem 1.5rem;
        margin-right: .6rem;
        margin-top: 1.5rem;
        display: flex;
        margin-left: auto;
        color: #54575a

    }
    .date{
        position: absolute;
        right: 0;
        bottom: -1.2rem;
        font-size: .8rem;
        width: 300%;
        text-align: right
    }
    .username{
        position: absolute;
        top: -1.5rem;
        right: 0;
    }
    .reportImg{
        height: 100px;
        margin-right: 2rem;
        margin-left: -.5rem
    }
    .pp{
        background-position: center;
        background-size: cover;
        min-width: 40px;
        height: 40px;
        background-color: #6c7885;
        border-radius: 100px
    }
    .publicDashboard{
        flex: 4;
        height: 100vh;
        overflow-x:hidden;
        background: #F4F6F8;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
        padding: 2rem 0;
    }
    .plsloginoverlay{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(3px);
        background: #ffffff0a;
        display: flex;
    } .plsloginoverlay p{
        margin: auto;
        color: #54575a
    }.plsloginoverlay a{
        color: #eb4e36
    }
    .submitbtn{
        margin-top: 1rem;
        padding: .6rem .8rem;
        border: 1px solid #eb4e36;
        background: #eb4e36;
        color: #ffffff;
        font-size: 1rem;
        cursor: pointer;
        margin-left: auto;

    }
    .leftText h1{
        font-size: 2rem;
        margin-bottom: 1rem;
    }
    .addFoto{
        background-color: #f4f6f8;
        border: 2px dotted #DAE3EB;
        margin-bottom: 1rem;
        position: relative;
        background-size: cover;
        background-position: center;
        overflow: hidden;
        height: fit-content;
        padding: .6rem .8rem;


    }
    .addFoto p{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%)
    }
    #uploadPreview{
        width: 300px;
        /* display: none */
    }
    .s1{
        display: flex;
        height: 100vh;
        width: 100%
    }
    .formContainer,.leftText{
        margin: auto;
        position: relative;
    }
    .form{
        display: flex;
        flex-direction: column;
        background: #fff;
        box-shadow: 0 4px 8px 1px #eb4e3618;
        padding: 1rem;
    }
    textarea{
        border: 1px solid #DAE3EB;
        resize: vertical;
        min-height: 100px;
        max-height: 400px;
        padding: .6rem .8rem;
        color: #6c7885;
        font-size: 1rem
    }
    textarea::placeholder{
        color: #c8d1da;
        font-size: 1rem
    }
</style>
{{-- s2 & navbar --}}
<style>
    .s2{
        height: 100vh;
        width: 100%;
        padding: 3rem;
        display: flex;
    }
    .heading{
        margin: auto;
        font-size: 1.2rem
    }
    .faq{
        margin-top: 2rem;
    }
    .navbar{
        position: absolute;
        width: 100%;
        display: flex;
        padding: 2rem 3rem
    }
    .login{
        text-decoration: none;
        padding: .6rem 1.2rem;
        color: #EB4E36;
        margin-left: auto;
    }
    .register{
        margin-left: 1rem;
        text-decoration: none;
        padding: .6rem 1.2rem;
        background: #EB4E36;
        color: white;
        font-size: 1rem;
        border: none
    }
    .logout{
        margin-left: auto;
        padding: .6rem 1.2rem;
        background: #EB4E36;
        color: white;
        font-size: 1rem;
        border: none;
        cursor: pointer;
    }
</style>
@endsection


@section('script')
<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("foto").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadLabel").style.padding = "0 0";
            document.getElementById("uploadLabel").style.backgroundColor = "none";
            document.getElementById("uploadLabel").style.border = "none";
            document.getElementById("uptext").innerHTML = "+ Ganti foto";
            document.getElementById("uptext").style.color = "#fff";
            document.getElementById("uploadPreview").src = oFREvent.target.result
        };
    };

</script>
@endsection
