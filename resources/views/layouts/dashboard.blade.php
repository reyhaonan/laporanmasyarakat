<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laporan Masyarakat | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Quicksand&display=swap" rel="stylesheet">
    <link rel="icon" href="/smk.png">

    <link rel="stylesheet" href="/icofont/icofont.min.css">
    <!-- Styles -->
    <link href="/app.css" rel="stylesheet">

    <style>
        body{
            background: #E6EEF5;
        }
        .pp{
            background-size: cover;
            background-position: center;
            height: 50px;
            background-color: #384e74;
            border-radius: 100px;
            margin: 2rem auto;
            width: 50px;
            margin-bottom: .2rem;
        }
        .globalContainer{
            display: flex;
            height: 100vh;
        }
        .username{
            margin-bottom: 1.7rem;
            color: #ffffff
        }
        .navbar{
            background: #fff;
            width: 100px;
            height: calc(100vh - 2rem);
            box-shadow: 0 4px 8px 1px #eb4e3609;
            display: flex;
            flex-direction: column;
            border-radius: 1rem;
            margin: 1rem;
            margin-bottom: 4rem;
            background: #293B5A;
            overflow: hidden;
        }
        .navbar a{
            text-decoration: none;
            padding: 1rem 1rem;
            font-size: .8rem;
            display: flex;
            flex-direction: column;

        }
        .navbar button{
            text-decoration: none;
            background: none;
            border: none;
            padding: 1rem 1rem;
            font-size: .8rem;
            text-align: center;
            /* display: flex; */
            flex-direction: column;
            margin-top: auto;
            cursor: pointer;

        }
        .navbar a:hover i{
            color:#e0e6eb
        }
        .navbar a:hover span{
            color:#e0e6eb
        }
        .navbar button:hover{
            color:#EB4E36
        }
        .navbar button:hover i{
            color:#EB4E36
        }
        .navbar-active{
            background: #384e74;

        }
        .navbar-active *{
            color: #f5faff

        }
        .navbar i{
            font-size: 2.3rem;
            margin: 0 auto;
        }
        .navbar span{
            text-align: center;
        }
        .navside{
            width: 10%;
            background: #293B5A;

        }
        .flair{
            position: absolute;
            background: #EB4E36;
            color: #fff;
            padding: 0 6px;
            right: 1.2rem;
            border-radius: 4px
        }
        .content{
            background: #fff;
            width: 100%;
            height: calc(100vh - 2rem);
            margin: 1rem;
            margin-left: 0;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 8px 1px #293B5A15;
            overflow-y: auto
        }

        .contentInfo{
            padding: 1rem 2rem;
            display: flex;
            position: sticky;
            top: 0;
            z-index: 12;
            background: #fff;
            box-shadow: 0 4px 8px 1px #293B5A09;

        }
        .contentInfo *{
            margin: auto 0
        }

        .pageInfo{
            margin-left: 2rem;
            font-size: .8rem
        }

        .back{
            text-decoration: none;
            color: #293B5A;
            border: 1px solid #293B5A;
            padding: .4rem .6rem;
            display: inline-block;
            margin-right: 2rem;
        }
        .dash{
            position: relative;
        }
        </style>

    @yield('style')
</head>
<body id="body">
    <div id="imgpreviewblur" onclick="closePreview()"></div>
    <img id="imgpreview">
    <p class="copyright">© Kelompok 7</p>
    <div class="globalContainer">
        <div class="navbar">
            <div class="pp" style="{{'background-image: url(/storage/'.Auth::user()->foto.')'}}"></div>
            <span class="username">{{ Auth::user()->username }}</span>
            <a href="/dashboard" class="dash {{ Route::is('dashboard') ? 'navbar-active' : '' }}">
                <i class="icofont-dashboard-web"></i>
                <span>Dashboard</span>
                @php
                    $reportCount = App\Models\Pengaduan::where('status','proses')->count();
                @endphp
                @if ($reportCount > 0)
                    <strong class="flair">{{$reportCount > 9? '9+': $reportCount}}</strong>
                @endif
            </a>
            <a href="/dashboard/petugas" class="{{ Route::is('petugas') ? 'navbar-active' : '' }}">
                <i class="icofont-tie"></i>
                <span>Data Petugas</span>
            </a>
            <a href="/dashboard/masyarakat" class="{{ Route::is('masyarakat') ? 'navbar-active' : '' }}">
                <i class="icofont-people"></i>
                <span>Data Masyarakat</span>
            </a>
            <a href="/dashboard/pengaduan" class="{{ Route::is('pengaduan') ? 'navbar-active' : '' }}">
                <i class="icofont-attachment"></i>
                <span>Data Pengaduan</span>
            </a>
            <a href="/dashboard/tanggapan" class="{{ Route::is('tanggapan') ? 'navbar-active' : '' }}">
                <i class="icofont-archive"></i>
                <span>Data Tanggapan</span>
            </a>
            <button type="submit" form="logout">
                <i class="icofont-sign-out"></i>
                Logout
            </button>
            <form action="{{route('logout')}}" method="POST" id="logout">@csrf</form>
        </div>
        <div class="content">
            <div class="contentInfo">


                {{-- Back button --}}
                {{-- <a href="{{url()->previous()}}" class="back round"><i class="icofont-arrow-left" style="color: #293B5A"></i>  Back</a> --}}



                <h2 class="black">{{ ucfirst(trans(Route::currentRouteName()))}}</h2>
                <span class="pageInfo">@yield('pageInfo')</span>
            </div>
            @yield('body')
        </div>
    </div>
    @yield('script')
    <script>
        function preview(url){
            document.getElementById('imgpreviewblur').style.display = 'inherit'
            document.getElementById('imgpreview').src = '/storage/' + url
            document.getElementById('imgpreview').style.display = 'inherit'
        }
        function closePreview(){
            document.getElementById('imgpreviewblur').style.display = 'none'
            document.getElementById('imgpreview').style.display = 'none'
        }
    </script>
</body>
</html>
