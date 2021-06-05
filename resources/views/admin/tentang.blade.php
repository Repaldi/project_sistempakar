@extends('layouts.master_dashboard_global')
<?php  use App\Penyakit;
    $penyakit = Penyakit::all();   
?>
@section('content')    
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="dashboard.html#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"> Cari</i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.html#" role="button">
              <i class="fa fa-question-circle-o" aria-hidden="true"> Bantuan</i>
              </a>
            </li>
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}" role="button" >
              <i class="fa fa-sign-in" aria-hidden="true"> Masuk</i>
              </a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}" role="button">
              <i class="fa fa-sign-in" aria-hidden="true"> Daftar</i>
              </a>
            </li>
            @endif
          </ul>
          @else           
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <!-- <img alt="Image" src="../../assets/img/theme/team-4.jpg"> -->
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->username }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Selamat Datang!</h6>
                </div>
                <a href="dashboard.html#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profil</span>
                </a>
                
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Keluar</span>
                </a>
              </div>
            </li>
          </ul>
          @endguest
        </div>
      </div>
    </nav>
    
     <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-12 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Halaman Penyakit</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container-fluid mt--6">
        <div class="row">
        <div class="col-xl-12">
           
        <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div class="row">
            <div class="col-6">
              <h3 class="mb-0">Tentang</h3>
            </div>
          </div>
        </div>
        <hr>
        <!-- Light table -->
        <div class="table-responsive">
            <div class="text-center">
            <img src="{{ asset('images/profil/shopee.png') }}" width="100px" heigth="100px" style="border-radius:100px;" alt="">
            <h1 style="font-family: 'Trirong', sans-serif;">SIDINAS 1.0</h1>
            </div>
            
                <div class="row" style="width:100%" >
                    
                    <div class="col-2 text-center" style="margin-left:400px" >
                        <div class="card" style="background-color:#D8D8D8; height: 30px; padding-top:5px; color:#989898">
                            <i class="fas fa-user"> Reza Wahyu Hardian</i>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <div class="card" style="background-color:#D8D8D8; height: 30px; padding-top:5px; color:#989898">
                            <i class="fas fa-user"> Repaldi Handi Saputra</i>
                        </div>
                    </div>
                    <div class="col-2 text-center" >
                        <div class="card" style="background-color:#D8D8D8; height: 30px; padding-top:5px; color:#989898">
                            <i class="fas fa-user"> Kharisma Jhorgi</i>
                        </div>
                    </div>
                    
            </div>
            <div class="text-center">
                <p style="font-family: Times new roman; font-weigth:bold; font-size:20px; color:grey">Sistem Pakar Diagnosa Penyakit Tanaman Nanas <br>
                Copyrigth &copy; 2021, Universitas Jambi</p>
                <p></p>
            </div>

            <div class="card center" style="width:90%; padding:30px;">
            <div class="text-justify">
                <p style="font-family: Times new roman; font-weigth:bold; font-size:20px; color:grey">Sistem pakar yang mampu mendiagnosa penyakit pada tanaman
                nanas berdasarkan pengetahuan yang diberikan lansung dari pakar/ahlinya dan melalui studi literatur. Penelitian ini menggunakan metode perhitungan
                Certainty Factor (CF) dalam menghitung tingkat kepakaran. Data penelitian ini terdiri dari data gejala dan data penyakit tanaman nanas, serta data 
                aturan. Sistem pakar pada organisasi ditujukan untuk penambahan value, peningkatan produktifitas serta area manajerial yang dapat mengambil kesimpulan 
                dengan cepat</p>
                <p></p>
            </div>
            </div>
            
                
        </div>
        
      </div>
        </div>  
        </div>
    </div>
</div>








@endsection