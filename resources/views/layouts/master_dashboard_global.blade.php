<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikasi Diagnosis Penyakit Tumbuhan Nanas">
  <meta name="author" content="kelompok nanas">
  <title>Sistem Pakar-Aplikasi Diagnosis Penyakit Tumbuhan Nanas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('asset_dashboard_1/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('asset_dashboard_1/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('asset_dashboard_1/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('asset_dashboard_1/css/argon.min-v=1.0.0.css')}}" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
</head>

<body>
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="dashboard.html">
          <img src="{{asset('asset_dashboard_1/img/brand/biru.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      @guest
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{'/'}}">
                <i class="fa fa-home" aria-hidden="true"  style="color:green"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('diagnosis')}}">
                <i class="fa fa-user-md" aria-hidden="true" style="color:blue"></i>
                <span class="nav-link-text">Diagnosis</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-history" aria-hidden="true" style="color:red"></i>
                <span class="nav-link-text">Riwayat</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-commenting-o" aria-hidden="true" style="color:green"></i>
                <span class="nav-link-text">Keterangan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-bookmark" aria-hidden="true" style="color:blue"></i>
                <span class="nav-link-text">Info Harga</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-info-circle" aria-hidden="true" style="color:red"></i>
                <span class="nav-link-text">Tentang</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      @else
      @if(Auth::user()->role == 1)
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="home">
                <i class="fa fa-home" aria-hidden="true"  style="color:green"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/pakar">
                <i class="fa fa-user-md" aria-hidden="true" style="color:blue"></i>
                <span class="nav-link-text">Pakar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/penyakit">
                <i class="fa fa-user-md" aria-hidden="true" style="color:blue"></i>
                <span class="nav-link-text">Penyakit</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/gejala">
                <i class="fa fa-history" aria-hidden="true" style="color:red"></i>
                <span class="nav-link-text">Gejala</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-commenting-o" aria-hidden="true" style="color:green"></i>
                <span class="nav-link-text">Pengetahuan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-bookmark" aria-hidden="true" style="color:blue"></i>
                <span class="nav-link-text">Post Keterangan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-info-circle" aria-hidden="true" style="color:red"></i>
                <span class="nav-link-text">Tentang</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      @else(Auth::user()->role == 2 )
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">
                <i class="fa fa-home" aria-hidden="true"  style="color:green"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="{{route('penyakit')}}">
                <i class="fa fa-user-md" aria-hidden="true" style="color:blue"></i>
                <span class="nav-link-text">Penyakit</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('gejala')}}">
                <i class="fa fa-history" aria-hidden="true" style="color:red"></i>
                <span class="nav-link-text">Gejala</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-commenting-o" aria-hidden="true" style="color:green"></i>
                <span class="nav-link-text">Pengetahuan</span>
              </a>
            </li>
         

          </ul>
        </div>
      </div>
      @endif
      
      @endguest
    </div>
  </nav>
  
  @yield('content')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Font -->
  <script src="https://use.fontawesome.com/79ca2039fc.js"></script>
  <!-- Core -->
  <script src="{{asset('asset_dashboard_1/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('asset_dashboard_1/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('asset_dashboard_1/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('asset_dashboard_1/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('asset_dashboard_1/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <script src="{{asset('asset_dashboard_1/vendor/lavalamp/js/jquery.lavalamp.min.js')}}"></script>
  <script src="{{asset('asset_dashboard_1/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('asset_dashboard_1/js/argon.min-v=1.0.0.js')}}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset('asset_dashboard_1/js/demo.min.js')}}"></script>
  @yield('linkfooter')
</body>

</html>