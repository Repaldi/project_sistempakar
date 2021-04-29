@extends('layouts.master_dashboard_global')
<?php  
use App\Pakar;
use App\PakarSyarat;

    $pakar = Pakar::where('user_id', Auth::user()->id )->first();
    if($pakar != null){
      $pakarsyarat= PakarSyarat::where('pakar_id',Auth::user()->pakar->id)->first();
    }else{
      
    }

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
          @elseif($pakarsyarat == null)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                <span class="alert-text"><strong>Pemberitahuan!</strong> Silahkan upload dokumen persyaratan .</span>
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
            
             @if($pakar != null)
            
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
                    @if($pakarsyarat != null)
                      <div class="custom-control custom-checkbox custom-checkbox-info">
                      @if($pakar->pakarsyarat->status == 0) 
                        <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                      @else
                        <input class="custom-control-input" id="chk-todo-task-3" type="checkbox" checked>
                      @endif
                        <label class="custom-control-label" for="chk-todo-task-3"></label>
                      </div>
                    @else
                    <div class="custom-control custom-checkbox custom-checkbox-info">
                    
                        <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                
                        <label class="custom-control-label" for="chk-todo-task-3"></label>
                      </div>
                    @endif
                    </div>
                  </div>
                </li>
              @else
              <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                  <div class="checklist-item checklist-item-warning">
                    <div class="checklist-info">
                      <h5 class="checklist-title mb-0">Upload Dokumen Pendukung</h5>
                      <small>(KTP, Bukti Seorang Pakar)</small>
                    </div>
                    <div>
                      <div class="custom-control custom-checkbox custom-checkbox-warning">
                        <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">
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
                        <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                        <label class="custom-control-label" for="chk-todo-task-3"></label>
                      </div>
                    </div>
                  </div>
                </li>
              @endif
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
                        <button type="submit"  class="nav-link py-2 px-3 active">
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
                        <a href="#" class="btn btn-sm nav-link py-2 px-3 active edit-pakar" 
                        data-user_id="{{Auth::user()->id}}" 
                        data-pakar_id="{{Auth::user()->pakar->id}}" 
                        data-nama_lengkap="{{Auth::user()->pakar->nama_lengkap}}" 
                        data-alamat="{{Auth::user()->pakar->alamat}}" 
                        data-nomor_hp="{{Auth::user()->pakar->nomor_hp}}" 
                        data-jenis_kelamin="{{Auth::user()->pakar->jenis_kelamin}}" 
                        data-foto="{{Auth::user()->pakar->foto}}" 
                        data-toggle="modal" data-target="#edit_pakar">
                            <span class="d-none d-md-block"><i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i></span>
                            <span class="d-md-none"><i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i></span>
                        </a>
                       
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
                              <select class="form-control" name="jenis_kelamin_update" id="jenis_kelamin" value="{{auth::user()->pakar->jenis_kelamin}}" >
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
                  </div>  
                </div>
              </div>

            @if($pakarsyarat == null)
            <div class="col-xl-4">
       
            </div>

            <div class="col-xl-8">
            <div class="card">
            <form action="{{route('storePakarSyarat')}}" method="post" enctype="multipart/form-data" >
		        @csrf
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                      <h6 class="text-black text-uppercase ls-1 mb-1">Dokumen Persyaratan</h6>
                    </div>
                    <div class="col">
                      <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item mr-2 mr-md-0" >
                        <button type="submit"  class="nav-link py-2 px-3 active">
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
                      <div class="col-md-12">
                        <!-- Upload Dokumen -->
                      <div class="custom-file">
                      <input type="hidden" name="pakar_id" value="{{auth::user()->pakar->id}}">
                        <input type="file" class="custom-file-input" name="dokumen" id="projectCoverUploads">
                        <label class="custom-file-label" for="projectCoverUploads">Upload Dokumen</label>
                      </div>
                      </div>  
                    </div>
                </div>
            </form>
            </div>

            @else
            <div class="col-xl-4">
            <!--SENGAJA KOSONG-->
            </div>
            <div class="col-xl-8">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                      <h6 class="text-black text-uppercase ls-1 mb-1">Dokumen Persyaratan</h6>
                    </div>
                   
                </div>
              </div>

              <div class="card-body">
                    <!-- Input groups with icon -->
                    <div class="row">
                      <div class="col-md-12">
                      @if($pakarsyarat->status == 0) 
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>Pemberitahuan! </strong> Silahkan tunggu dalam waktu 1x24 jam, Dokumen sedang diverifikasi !</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                       </div> 
                      @else
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-text"><strong>SELAMAT ! </strong>Dokumen Telah Diverifikasi, Sekarang anda dapat melakukan aktivitas diaplikasi ini !</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                       </div> 
                    
                      @endif 
                      </div>  
                    </div>
                </div>
            </div>


              @endif
        @endif
      </div>
    </div>
</div>

@stop
@section('linkfooter')

<script>
    $(document).ready(function () {
        $(".edit-pakar").click(function (e) {
        var nama_lengkap      = $(this).data('nama_lengkap')
        var pakar_id          = $(this).data('pakar_id');
        var user_id           = $(this).data('user_id');
        var jenis_kelamin     = $(this).data('jenis_kelamin');
        var nomor_hp          = $(this).data('nomor_hp');
        var alamat            = $(this).data('alamat');
        var foto              = $(this).data('foto');

        $("#pakar_id_update").val(pakar_id);
        $("#user_id_update").val(user_id);
        $("#nama_lengkap_update").val(nama_lengkap);
        $("#jenis_kelamin_update").val(jenis_kelamin);
        $("#nomor_hp_update").val(nomor_hp);
        $("#alamat_update").val(alamat);
        $('#foto_update').attr("src", "{{url('images/profil')}}"+"/"+foto);
        });
    });
</script>

@if(Session::has('success-edit'))
<script>
    swal({
        title: "Berhasil",
        text: "Berhasil Mengedit Profil",
        icon: "success",
        button: "OK",
    });
</script>
@endif

<!-- Modal EDIT PENYAKIT -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="edit_pakar">
    <div class="modal-dialog modal-lg-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Edit Pakar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('updateProfilPakar')}}" enctype="multipart/form-data" method="post">
          @csrf @method('PATCH')
            <div class="modal-body">
              <div class="container">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nama_pakar" class="col-form-label">Nama Lengkap</label>
                      <input type="hidden" value="" name="user_id" id="user_id_update">
                      <input type="hidden" value="" name="pakar_id" id="pakar_id_update">
                      
                      <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap_update" value="">
                    </div>
                    <div class="form-group">
                      <label for="jenis_kelamin_update" class="col-form-label">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin_update">
                          <option selected id="jenis_kelamin_update"></option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="nomor_hp" class="col-form-label">Nomor Hp</label>
                        <textarea class="form-control" name="nomor_hp" id="nomor_hp_update" value=""></textarea>
                    </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat_update" value=""></textarea>
                    </div>

                    <div class="form-group">
                        <img src="" class="mb-3"  height="230px" width="100%"  id="foto_update">
                        <input type="file" name="foto">
                        <p><strong>*biarkan kosong jika tidak ingin menambah foto</strong></p>
                    </div>
                  </div>
              </div>
            </div>


          <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-info btn-sm" >Simpan</button>
          </div>
        </form>
      </div>
    </div>
</div>


@endsection