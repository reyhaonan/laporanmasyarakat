
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laporan masyarakat</title>


        <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
            body {
                background-color: #313040;
                overflow: hidden;
            }
            .adminbutton {
                margin-left: 480px;
            }
            .civilbutton {
                margin-left: 50px;
            }
            .text {
                font-family: 'Ubuntu', sans-serif;
                text-align: center;
                margin-top: 200px;
                font-weight: 650;
                color: white;
            }
            .logintext {
                font-family: 'Ubuntu', sans-serif;
                text-align: center;
                color: white;
                font-weight: 650;
                margin-top: 20px;
            }
            .textbox{
                text-align: center;
                margin-top: 10px;
            }
            .usernametext{
                font-family: 'Ubuntu', sans-serif;
                text-align: center;
                margin-top: 40px;
                font-weight: 650;
                color: white;
            }
            .usernametexttoo{
                text-align: center;
                margin-top: 20px;
            }
            .usernametextthree{
                text-align: center;
                margin-top: 10px;
            }
            .margin{
                font-family: 'Ubuntu', sans-serif;
                font-weight: 650;
                font-size: 13px;
                width: 88px;
                height: 31px;
                border: none;
                border-radius: 4px;
                background: #1d8fe0;
                text-decoration: none;
                font-weight: 500;
                color: #EAEAEA;
                margin-top: 10px;
                transition-duration: 0.4s;
                transition-duration: 0.4s;
                text-decoration: none;
                overflow: hidden;
                cursor: pointer;
            }
            .buttontext {
                font-family: 'Ubuntu', sans-serif;
                font-size: 18px;
                text-align: center;
                width: 157px;
                height: 34px;
                border: none;
                border-radius: 4px;
                background: #54526B;
                text-decoration: none;
                font-weight: 500;
                color: #EAEAEA;
            }
            .buttontexttoo {
                font-family: 'Ubuntu', sans-serif;
                font-size: 13px;
                width: 157px;
                height: 34px;
                border: none;
                border-radius: 4px;
                background: #54526B;
                text-decoration: none;
                font-weight: 500;
                color: #EAEAEA;
                padding: 8px;
            }
            .card-body {
                position: absolute;
                left: 530px;
                top: 100px;
                width: 300px;
                height: 300px;
                background-color: #54526B;
                border-radius: 4px;
            }
            .square1 {
                position: absolute;
                left: -100px;
                bottom: -125px;
                height: 400px;
                width: 400px;
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
                width: 490px;
                border: 8px solid #555;
                border-radius: 65px;
                fill: none;
                border-color: #54526B;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                        <div class="logintext">{{ __('Login') }}</div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="usernametext">
                                    <label for="username" class="text">{{ __('Username') }}</label>

                                    <div class="textbox">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="usernametexttoo">
                                    <label for="password" class="text">{{ __('Kata Sandi') }}</label>

                                    <div class="textbox">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="usernametextthree">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="text" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="usernametextthree">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="margin">
                                            {{ __('Login') }}
                                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="square1"></div>
        <div class="square2"></div>
    </body>
</html>
