<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Diagnosis Penyakit Tumbuhan Nanas - Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('asset_form/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('asset_form/css/style.css')}}">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Daftar Sebagai Pakar</h2>
                        <form method="POST" class="register-form"action="{{ route('register') }}">
                        @csrf
                        <!-- Sebagai Siswa Role 2 -->
                        <input type="hidden" name="role" value="2">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Nama Pengguna"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Kata Sandi"/>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi Kata Sandi"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Daftar"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('asset_form/images/daftar1.jpg')}}" alt="sing up image"></figure>
                        Sudah Memiliki Akun? <a href="{{ route('login') }}" >Klik Disni</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('asset_form/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset_form/js/main.js')}}"></script>
</body>
</html>