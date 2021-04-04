@extends('layouts.app')
@section('title','register')
@section('body')
<div class="container round">
    <div class="registertext">Register</div>
    <form method="POST" action="{{ route('register') }}" id="register" enctype="multipart/form-data">@csrf</form>

        <label for="foto" class="addFoto round" id="uploadLabel">
            <p style="margin: auto;" id="uptext">+ Upload foto</p>
        </label>
        <input type="file" form="register" name="foto" onchange="PreviewImage()" id="foto" hidden accept="image/*">

        <div class="leftSide">
            <input id="nama" type="text" class="input round @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="off" autofocus form="register" placeholder="Nama lengkap">

            @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="nik" type="number" class="input round @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="off" autofocus form="register" placeholder="Nik">

            @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="notelp" type="number" class="input round @error('notelp') is-invalid @enderror" name="notelp" value="{{ old('notelp') }}" required autocomplete="off" autofocus form="register" placeholder="Nomor telepon">

            @error('notelp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="rightSide">

            <input id="username" type="text" class="input round @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus form="register" placeholder="Username">

            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="password" type="password" class="input round @error('password') is-invalid @enderror" name="password" required autocomplete="off" form="register" placeholder="Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="password-confirmation" type="password" class="input round @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="off" form="register" placeholder="Konfirmasi Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>



        <textarea name="alamat" class="input round textarea @error('alamat') is-invalid @enderror" placeholder="Alamat" form="register" >{{ old('alamat') }}</textarea>
        @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <div style="display: flex;margin-left:auto;margin-top:.5rem">
            <button type="submit" class="register round" form="register">
                Register
            </button>
            <a class="login" href="/login">
                Login
            </a>
        </div>
</div>
@endsection

@section('style')
<style>
    body{
        display: flex;
        height: 100vh;
    }
    .registertext{
        position: absolute;
        top: -3rem;
        left: 50%;
        transform: translateX(-50%);
    }
    .leftSide{
        display: flex;
        flex-direction: column;
        width: calc(50% - (3rem + (.8rem * 6) + 2rem) / 2 - 1rem);
        padding-right: .5rem;
        margin-left: 1rem;
    }
    .addFoto{
        background-color: #f4f6f8;
        border: 2px dotted #DAE3EB;
        margin: .5rem 0;
        padding: .6rem .8rem;
        cursor: pointer;
        height: calc(3rem + (.8rem * 6) + 2rem);
        width: calc(3rem + (.8rem * 6) + 2rem);
        display: flex;
        background-size: cover;
        background-position: center
    }
    .rightSide{
        display: flex;
        flex-direction: column;
        width: calc(50% - (3rem + (.8rem * 6) + 2rem) /2);

        padding-left: .5rem
    }
    .textarea{
        resize: vertical;
        width: 100%;
        min-height: 120px;
        max-height: 400px;
    }
    .container{
        position: relative;
        margin: auto;
        display: flex;
        background: #fff;
        padding: 2rem;
        box-shadow: 0 4px 8px 1px #eb4e360c;
        flex-wrap: wrap

    }
    .input{
        border: 1px solid #DAE3EB;
        padding: .6rem .8rem;
        color: #6c7885;
        font-size: 1rem;
        margin: .5rem 0
    }
    .is-invalid{
        border: 1px solid #eb4e36
    }
    .is-invalid::placeholder{
        color: #e9a095 !important;
    }
    .input::placeholder{
        color: #c8d1da;
        font-size: 1rem
    }
    .register{
        border: none;
        color: #fff;
        background: #eb4e36;
        font-size: 1rem;
        padding: .5rem 1rem;
        margin: auto 0;
        cursor: pointer;
    }
    .login{
        text-decoration: none;
        color: #eb4e36;
        margin: auto 0;
        text-align: center;
        padding: .5rem 1.4rem;
        margin-left: 1rem;
    }
    .invalid-feedback{
        font-size: .6rem;
        margin-top: -.4rem;
    }
    .invalid-feedback strong{
        color: #eb4e36 !important;
    }
</style>
@endsection

@section('script')
    <script>
        function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("foto").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uptext").innerHTML = "+ Ganti foto";
            document.getElementById("uptext").style.color = "#fff";
            document.getElementById("uploadLabel").style.border = "none";
            document.getElementById("uploadLabel").style.backgroundImage = "url("+ oFREvent.target.result +")";
        };
    };

    </script>
@endsection
