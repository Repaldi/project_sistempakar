@extends('layouts.master_dashboard_global')
<?php  use App\Pakar;
        use App\PakarSyarat;
    $pakar = Pakar::where('user_id', Auth::user()->id )->first();
  
    $pakarsyarat= PakarSyarat::whereId(Auth::user()->id)->first();
    

   
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
              <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
            </div>
          </div>
          @if(Pakar::where('user_id', Auth::user()->id )->first() == null )  
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                <span class="alert-text"><strong>Pemberitahuan!</strong> Silahkan lengkapi profil dan persyaratan anda untuk menjadi pakar.</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>  
          @else
          @endif
        </div>
      </div>
    </div>
    
    <div class="container-fluid mt--6">
        <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0 text-black">Persyaratan</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
            <ul class="list-group list-group-flush" data-toggle="checklist">
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-success">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">Lengkapi Profil</h5>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-success">
                      @if ( Pakar::where('user_id', Auth::user()->id )->first() == null )  
                        <input class="custom-control-input" id="chk-todo-task-1" type="checkbox" >
                      @else
                        <input class="custom-control-input" id="chk-todo-task-1" type="checkbox" checked>
                      @endif
                        <label class="custom-control-label" for="chk-todo-task-1"></label>
                      </div>
                    </div>
                  </div>
                </li>
            
             
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-warning">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">Upload Dokumen Pendukung</h5>
                      <small>(KTP, Bukti Seorang Pakar)</small>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-warning">
                      @if ( PakarSyarat::where('pakar_id', Auth::user()->pakar->id )->first() == null )  
                        <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">
                      @else
                        <input class="custom-control-input" id="chk-todo-task-2" type="checkbox" checked>
                      @endif
                        <label class="custom-control-label" for="chk-todo-task-2"></label>
                      </div>
                    </div>
                  </div>
                </li>
                
                <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-info">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">Verifikasi Pendaftaran</h5>
                      <small>(Pendaftaran akan diverifikasi langsung oleh administrator)</small>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-info">
                      @if ( PakarSyarat::where('pakar_id', Auth::user()->pakar->id )->first() == null ) 
                        <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                      @else
                        <input class="custom-control-input" id="chk-todo-task-3" type="checkbox" checked>
                      @endif
                        <label class="custom-control-label" for="chk-todo-task-3"></label>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @if ( Pakar::where('user_id', Auth::user()->id )->first() == null )  
        <div class="col-xl-8">
        <form action="{{route('storeProfilPakar')}}" method="post" enctype="multipart/form-data" >
		    @csrf
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                      <h6 class="text-black text-uppercase ls-1 mb-1">Selamat Datang !</h6>
                      <h5 class="h3 text-black mb-0 text-uppercase" >{{Auth::user()->username}}</h5>
                    </div> 
                    <div class="col">
                      <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item mr-2 mr-md-0" >
                        <button type="submit" onclick="alert()"  class="nav-link py-2 px-3 active">
                            <span class="d-none d-md-block"><i class="fa fa-floppy-o" aria-hidden="true"> Simpan</i></span>
                            <span class="d-md-none"><i class="fa fa-floppy-o" aria-hidden="true"> Simpan</i></span>
                        </button>
                        </li>
                      </ul>
                    </div>
                </div>
              </div>

              <div class="card-body">
                    <!-- Input groups with icon -->
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                              </div>
                              <input class="form-control" value="{{auth::user()->id}}" name="user_id" type="hidden" >
                              <input class="form-control" placeholder="{{auth::user()->email}}" type="email" readonly>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" type="text">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-transgender" aria-hidden="true"></i></span>
                            </div>
                              <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" >
                                          <option value="Laki-laki" selected>Laki-laki</option>
                                          <option value="Perempuan">Perempuan</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            </div>
                            <input class="form-control" placeholder="Nomor Hp" name="nomor_hp" type="text">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                            <input class="form-control" placeholder="Alamat" name="alamat" type="text">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Upload Foto -->
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="foto" id="projectCoverUploads">
                      <label class="custom-file-label" for="projectCoverUploads">Pilih Foto</label>
                    </div>

              </div>  

            </div>
        </form>
        </div>
        @else
        <div class="col-xl-8">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                      <h6 class="text-black text-uppercase ls-1 mb-1">Selamat Datang !</h6>
                      <h5 class="h3 text-black mb-0 text-uppercase" >{{Auth::user()->username}}</h5>
                    </div> 
                    <div class="col">
                      <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item mr-2 mr-md-0" >
                        <button type="submit" onclick="alert()"  class="nav-link py-2 px-3 active">
                            <span class="d-none d-md-block"><i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i></span>
                            <span class="d-md-none"><i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i></span>
                        </button>
                        </li>
                      </ul>
                    </div>
                </div>
              </div>
              <div class="card-body">
                    <!-- Input groups with icon -->
                    <div class="row">
                      <div class="col-md-12 text-center">
                      <img src="{{ url('images/profil/' . $pakar->foto) }}" width="150px"  style="border: 2px solid #555; border-radius:20px;" alt="Avatar">
                      </div>
                    </div>
                    <br/>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                              </div>
                              <input class="form-control" placeholder="{{auth::user()->email}}" type="email" readonly>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control" placeholder="{{auth::user()->pakar->nama_lengkap}}" name="nama_lengkap" type="text">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-transgender" aria-hidden="true"></i></span>
                            </div>
                              <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" >
                                          <option value="Laki-laki" selected>Laki-laki</option>
                                          <option value="Perempuan">Perempuan</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            </div>
                            <input class="form-control" placeholder="{{auth::user()->pakar->nomor_hp}}" name="nomor_hp" type="text">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="input-group input-group-merge">
                            <input class="form-control" placeholder="{{auth::user()->pakar->alamat}}" name="alamat" type="text">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Upload Foto -->
                 

              </div>  

            </div>
        
        </div>
        @endif

      
        
      </div>
      </div>
</div>

@stop
<script>
function alert() {
    swal({
        title: "Data profil berhasil di simpan !",
        icon: "success",
    });
}
</script>