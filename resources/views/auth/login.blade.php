
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
            .textbox{
                text-align: center;
                margin-top: 20px;
            }
            .emailtext{
                font-family: 'Ubuntu', sans-serif;
                text-align: center;
                margin-top: 40px;
                font-weight: 650;
                color: white;
            }
            .emailtexttoo{
                text-align: center;
                margin-top: 20px;
            }
            .emailtextthree{
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
                background: #54526B;
                text-decoration: none;
                font-weight: 500;
                color: #EAEAEA;
                margin-top: 10px;
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
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="text">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="emailtext">
                                    <label for="email" class="text">{{ __('Alamat Email') }}</label>

                                    <div class="textbox">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="emailtexttoo">
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

                                <div class="emailtextthree">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="text" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="emailtextthree">
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
    </body>
</html>
