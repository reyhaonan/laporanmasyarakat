@extends('layouts.app')
@section('title','Login')
@section('body')
<div class="container round">
    <div class="logintext">Login</div>
    <form method="POST" action="{{ route('login') }}" id="login">@csrf</form>

        <input id="username" type="text" class="input round @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus form="login" placeholder="Username">

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password" type="password" class="input round @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" form="login" placeholder="Password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="rememberContainer">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} form="login">

            <label class="text" for="remember" >
                Ingat saya
            </label>
        </div>

        <button type="submit" class="login round" form="login">
            Login
        </button>
        <a class="register" href="/register">
            Register
        </a>
</div>
@endsection

@section('style')
<style>
    body{
        display: flex;
        height: 100vh;
    }
    .logintext{
        position: absolute;
        top: -3rem;
        left: 50%;
        transform: translateX(-50%);
    }
    .container{
        position: relative;
        margin: auto;
        display: flex;
        flex-direction: column;
        background: #fff;
        padding: 2rem;
        box-shadow: 0 4px 8px 1px #eb4e360c;

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
    .login{
        border: none;
        color: #fff;
        background: #eb4e36;
        font-size: 1rem;
        padding: .5rem;
        margin: .5rem 0;
        cursor: pointer;
    }
    .register{
        text-decoration: none;
        color: #eb4e36;
        text-align: center;
        padding: .5rem;
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
