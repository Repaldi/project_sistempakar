@extends('layouts.master_dashboard_global')

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
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}" role="button" >
              <i class="fa fa-sign-in" aria-hidden="true"> Masuk</i>
              </a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}" role="button">
              <i class="fa fa-registered" aria-hidden="true"> Daftar</i>
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
                    <img alt="Image" src="../../assets/img/theme/team-4.jpg">
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
              <h6 class="h2 text-white d-inline-block mb-0">Hasil Diagnosis</h6>
            </div>
          </div>
          <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                <span class="alert-text"><strong>Info !</strong> </span>
                <span class="alert-text">Berikut Hasil Diagnosa Penyakit Berdasarkan Gejala Yang Telah Anda Pilih.
                </span>
            </div>  
        </div>
      </div>
    </div>
   
    <div class="container-fluid mt--6">
        <div class="row">
        <div class="col-xl-12">
       
        <div class="card">
        <!-- Card header -->
        
        <!-- Light table -->
        <div class="table-responsive">
        
          <table class="table align-items-center table-flush table-striped">
        
            <thead class="thead-light">
          
              <tr>
                <th>Nama Penyakit</th>
                <th>Gejala </th>
                <th>Bobot </th>
                <th>Hasil</th>
              </tr>
              
            </thead>
            <tbody>
            <tr>
                <th rowspan='3' >FUSARIOSIS</th>
                <th>Tanaman Kerdil </th>
                <th> 0.6 </th>
                <th rowspan='3'>96%</th>
              </tr>
              <tr>
                
                <th>Daun Berbentuk Klorotik </th>
                <th> 0.8 </th>
               
              </tr>
              <tr>
                
                <th>Ujung Batang Bengkok</th>
                <th> 0.8 </th>
               
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  
        </div>  
        </div>
      
    </div>
  
</div>

@stop
