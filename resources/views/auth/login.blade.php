<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Diagnosis Penyakit Tumbuhan Nanas- Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('asset_form/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('asset_form/css/style.css')}}">
</head>
<body>
    @if(session('alert'))
      <script>
        alert('Anda tidak boleh memasuki halaman tersebut');
      </script>
    @endif
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('asset_form/images/login1.jpg')}}" alt="sing up image"></figure>
                        Belum Punya Akun? <a href="{{ route('register') }}">Klik Disini</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Masuk</h2>
                        <form method="POST" class="register-form" action="{{ route('login') }}" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email"  placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password"  placeholder="Kata Sandi"/>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="form-group">
                            Lupa Kata Sandi?<a href="{{ route('password.request') }}"> Klik Disini</a>
                            </div>
                            @endif
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Masuk"/>
                            </div>
                        </form>
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
