
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
                font-family:'Ubuntu', sans-serif;
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
                text-align: center;
                margin-top: -80px;
                font-weight: 650;
                color: white;
            }
            .textbox{
                text-align: center;
                margin-top: 20px;
            }
            .nametext{
                font-family: 'Ubuntu', sans-serif;
                text-align: center;
                margin-top: 40px;
                font-weight: 650;
                color: white;
            }
            .label{
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
                background: #1d8fe0;
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
            .card-body {
                position: relative;
                left: 530px;
                top: 100px;
                width: 300px;
                height: 600px;
                background-color: #54526B;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                    <div class="card-body">
                        <div class="text">{{ __('Daftar') }}</div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="nametext">
                                    <label for="nama">{{ __('Nama Lengkap') }}</label>

                                    <div class="textbox">
                                        <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required autocomplete="nama">
                                    </div>
                                </div>

                                <div class="label">
                                    <label for="username">{{ __('Username') }}</label>

                                    <div class="textbox">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                    </div>
                                </div>

                                <div class="label">
                                    <label for="nik">{{ __('NIK') }}</label>

                                    <div class="textbox">
                                        <input id="nik" type="nik" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik">
                                    </div>
                                </div>

                                <div class="label">
                                    <label for="notelp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                                    <div class="textbox">
                                        <input id="notelp" type="notelp" class="form-control @error('nik') is-invalid @enderror" name="notelp" value="{{ old('notelp') }}" required autocomplete="notelp">
                                    </div>
                                </div>
                                <div class="label">
                                    <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                    <div class="textbox">
                                        <input id="alamat" type="alamat" class="form-control @error('nik') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">
                                    </div>
                                </div>

                                <div class="label">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="textbox">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="label">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

                                    <div class="textbox">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="usernametextthree">
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
        </div>
        <div class="square1"></div>
        <div class="square2"></div>
</body>
</html>
