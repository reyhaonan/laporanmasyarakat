
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                margin-top: 50px;
                font-weight: 650;
                color: white;
            }
            .textbox{
                text-align: center;
                margin-top: 20px;
            }
            .usernametext{
                font-family: 'Ubuntu', sans-serif;
                text-align: center;
                margin-top: 40px;
                font-weight: 650;
                color: white;
            }
            .usernametexttoo{
                font-family: 'Ubuntu', sans-serif;
                text-align: center;
                margin-top: 20px;
                font-weight: 650;
                color: white
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
                        <div class="text">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="usernametext">
                                    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                                    <div class="textbox">
                                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="usernametexttoo">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                    <div class="textbox">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="usernametexttoo">
                                    <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                                    <div class="textbox">
                                        <input id="nik" type="nik" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="usernametexttoo">
                                    <label for="notelp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                                    <div class="textbox">
                                        <input id="notelp" type="notelp" class="form-control @error('nik') is-invalid @enderror" name="notelp" value="{{ old('notelp') }}" required autocomplete="notelp">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="usernametexttoo">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="textbox">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="usernametexttoo">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

                                    <div class="textbox">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="usernametextthree">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="margin">
                                            {{ __('Daftar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
