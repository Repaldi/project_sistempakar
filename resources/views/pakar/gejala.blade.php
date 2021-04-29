@extends('layouts.master_dashboard_global')
<?php  use App\Gejala;
    $gejala = Gejala::all();   
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
              <h6 class="h2 text-white d-inline-block mb-0">Halaman Gejala</h6>
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
              <h3 class="mb-0">Daftar Gejala</h3>
            </div>
            <div class="col-6 text-right">
            <a href="#" class="btn btn-primary btn-sm navbar-btn-right" data-toggle="modal" data-target="#tambah_gejala">
                <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                <span class="btn-inner--text">Tambah Gejala</span>
              </a>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush table-striped">
            <thead class="thead-light">
              <tr>
                <th>Kode Gejala</th>
                <th>Nama Gejala</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @forelse($gejala as $item)
              <tr>
                <td>{{$item->kode_gejala}}</td>
                <td>
                <a href="tables.html#!" class="font-weight-bold">{{$item->nama_gejala}}</a>
                </td>
               
                <td class="table-actions">
                <a href="#" class="btn btn-sm edit-gejala" data-gejala_id="{{$item->id}}" data-kode_gejala="{{$item->kode_gejala}}" data-nama_gejala="{{$item->nama_gejala}}" data-toggle="modal" data-target="#edit_gejala"> 
                <i class="fas fa-user-edit" style="color:blue"></i>
                </a> | 
                <a href="#" class="btn btn-sm hapus-gejala" data-gejala_id="{{$item->id}}" data-nama_gejala="{{$item->nama_gejala}}">
                    <i class="fas fa-trash" style="color:red"></i>
                  </a>
                </td>
              </tr>
            @empty
            <tr>
									<td colspan="4"> Belum ada data Gejala</td>
								</tr>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
        </div>  
        </div>
    </div>
</div>

@endsection

@section('linkfooter')
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $(document).ready(function () {
        $(".edit-gejala").click(function (e) {
        const kode_gejala      = $(this).data('kode_gejala')
        const nama_gejala      = $(this).data('nama_gejala')
        const gejala_id        = $(this).data('gejala_id');
        // console.log(nama_gejala);
        // console.log(gejala_id);
       
        $("#gejala_id_update").val(gejala_id);
        $("#nama_gejala_update").val(nama_gejala);
        $("#kode_gejala_update").val(kode_gejala);

        });
    });

    $('.hapus-gejala').click(function(){
			const gejala_id = $(this).data('gejala_id');
			const nama_gejala = $(this).data('nama_gejala');

            swal({
                title: "Hapus?",
                text: "Yakin mau menghapus gejala "+ nama_gejala + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = '/gejala/delete/'+gejala_id;
                }
            });

		});

</script>

@if(Session::has('success-edit'))
<script>
    swal({
        title: "Berhasil",
        text: "Berhasil mengedit Gejala",
        icon: "success",
        button: "OK",
    });
</script>
@endif

<!-- Modal EDIT Gejala -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="edit_gejala">
    <div class="modal-dialog modal-lg-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Edit Gejala</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('updateGejala')}}" enctype="multipart/form-data" method="post">
          @csrf @method('PATCH')
            <div class="modal-body">
              <div class="container">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="kode_gejala" class="col-form-label">Kode Gejala</label>
                      <input class="form-control" type="text" name="kode_gejala_update" id="kode_gejala_update" value="">
                    </div>
                    <div class="form-group">
                      <label for="nama_gejala" class="col-form-label">Nama Gejala</label>
                      <input type="hidden" value="" name="gejala_id_update" id="gejala_id_update">
                      <input class="form-control" type="text" name="nama_gejala_update" id="nama_gejala_update" value="">
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

    <!-- Modal TAMBAH EBOOK -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="tambah_gejala">
    <div class="modal-dialog modal-lg-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Tambahkan Gejala</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('storeGejala')}}" enctype="multipart/form-data" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
              <div class="container">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="kode_gejala" class="col-form-label">Kode gejala</label>
                      <input class="form-control" type="text" name="kode_gejala" id="kode_gejala">
                    </div>
                    <div class="form-group">
                      <label for="nama_gejala" class="col-form-label">Nama gejala</label>
                      <input class="form-control" type="text" name="nama_gejala" id="nama_gejala">
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