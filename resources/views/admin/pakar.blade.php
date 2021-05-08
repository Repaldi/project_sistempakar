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
              <h3 class="mb-0">Daftar Pakar</h3>
            </div>
            <div class="col-6 text-right">
            <!-- <a href="#" class="btn btn-primary btn-sm navbar-btn-right" data-toggle="modal" data-target="#tambah_penyakit">
                <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                <span class="btn-inner--text">Tambah Pakar</span>
              </a> -->
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush table-striped">
            <thead class="thead-light">
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Jenis Kelamin</th>
                <th>Photo</th>
                <th>Dokumen</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <form action="{{route('pakarVerify')}}" method="post">
            @csrf
            @method('patch')
            @forelse($pakar as $item)
            
              <tr>
                <td class="table-user">
                  {{$item->nama_lengkap}}
                </td>
                <td>
               {{$item->alamat}}
                </td>
                <td>
                  {{$item->nomor_hp}}
                </td>
                <td class="table-actions">
                {{$item->jenis_kelamin}}
                </td>
                <td class="table-actions">
                <img src="{{ asset('images/profil/' . $item->foto) }}" width="50px" heigth="50px" alt="">
                </td>
                @if($item->pakarSyarat != null)
                <td class="table-actions">
                {{$item->pakarSyarat->dokumen}}
                </td>
                @else
                <td class="table-actions">
                
                </td>
                @endif
                <input type="hidden" value= "1" name="status"> 
                @if($item->pakarSyarat != null)
                <input type="hidden" value="{{$item->pakarSyarat->id}}" name="id">
                
                <td class="table-actions">
                <button type="submit" >verify</button>
                <a href="/pakar/hapus/{{$item->pakarSyarat->id}}" class="btn-sm btn-danger">Tolak</a>
                </td>
                @endif
              </tr>
            @empty
            <tr>
									<td colspan="4"> Belum ada data penyakit</td>
								</tr>
            @endforelse
            </form>

            </tbody>
          </table>
        </div>
      </div>
        </div>  
        </div>
    </div>
</div>

@stop

@section('linkfooter')

<script>
    $(document).ready(function () {
        $(".edit-penyakit").click(function (e) {
        const nama_penyakit      = $(this).data('nama_penyakit')
        const penyakit_id        = $(this).data('penyakit_id');
        const detail_penyakit    = $(this).data('detail_penyakit');
        const saran_penyakit     = $(this).data('saran_penyakit');

        console.log(nama_penyakit);
        console.log(penyakit_id);
        console.log(detail_penyakit);
        console.log(saran_penyakit);
        $("#penyakit_id_update").val(penyakit_id);
        $("#detail_penyakit_update").val(detail_penyakit);
        $("#nama_penyakit_update").val(nama_penyakit);
        $("#saran_penyakit_update").val(saran_penyakit);

        });
    });

    $('.hapus-penyakit').click(function(){
			const penyakit_id = $(this).data('penyakit_id');
			const nama_penyakit = $(this).data('nama_penyakit');

            swal({
                title: "Hapus?",
                text: "Yakin mau menghapus Penyakit "+ nama_penyakit + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = '/penyakit/delete/'+penyakit_id;
                }
            });

		});

</script>

@if(Session::has('success-edit'))
<script>
    swal({
        title: "Berhasil",
        text: "Berhasil mengedit Penyakit",
        icon: "success",
        button: "OK",
    });
</script>
@endif

    <!-- Modal TAMBAH EBOOK -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="tambah_penyakit">
    <div class="modal-dialog modal-lg-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Tambahkan Penyakit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('storePenyakit')}}" enctype="multipart/form-data" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
              <div class="container">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nama_penyakit" class="col-form-label">Nama Penyakit</label>
                      <input class="form-control" type="text" name="nama_penyakit" id="nama_penyakit">
                    </div>
                    <div class="form-group">
                      <label for="detail_penyakit" class="col-form-label">Detail Penyakit</label>
                      <textarea class="form-control" name="detail_penyakit" id="detail_penyakit"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="saran_penyakit" class="col-form-label">Saran Penyakit</label>
                        <textarea class="form-control" name="saran_penyakit" id="saran_penyakit" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-form-label">Gambar </label>
                        <input type="file" name="foto" class="form-control" id="foto">
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


<!-- Modal EDIT PENYAKIT -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="edit_penyakit">
    <div class="modal-dialog modal-lg-12" >
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title " id="exampleModalLabel"> Edit Penyakit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('updatePenyakit')}}" enctype="multipart/form-data" method="post">
          @csrf @method('PATCH')
            <div class="modal-body">
              <div class="container">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="nama_penyakit" class="col-form-label">Nama Penyakit</label>
                      <input type="hidden" value="" name="penyakit_id_update" id="penyakit_id_update">
                      <input class="form-control" type="text" name="nama_penyakit_update" id="nama_penyakit_update" value="">
                    </div>
                    <div class="form-group">
                      <label for="detail_penyakit" class="col-form-label">Detail Penyakit</label>
                      <textarea class="form-control" name="detail_penyakit_update" id="detail_penyakit_update" value=""> </textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="saran_penyakit" class="col-form-label">Saran Penyakit </label>
                        <textarea class="form-control" name="saran_penyakit_update" id="saran_penyakit_update" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-form-label">Gambar</label>
                        <input type="file" name="foto_update" class="form-control" id="foto_update">
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