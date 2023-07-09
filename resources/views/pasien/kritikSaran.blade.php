@extends('layouts.main')

@section('content')
<style>
	.input{
    display: grid;
    grid-template-columns: 200px 1350px;
  }
	input{
		margin-bottom: 10px
	}
	select{
		margin-bottom: 10px
	}
	textarea{
		margin-bottom: 10px
	}
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
  }
</style>
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Form Kritik & Saran</h1>
    <!-- DataTales Example -->
		@if($checkPasien == 0)
		<span style="color: #F23E3E">Silahkan lengkapi data diri anda terlebih dahulu</span>
		@else
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        Form Data Kunjungan
      </div>
			<div class="card-body">
				<span style="margin-left: 18px">Kami senang mendengar dari Anda, silahkan sampaikan komentar, opini, masukan/saran terkait pelayanan maupun hal lainnya kepada kami dengan mengisi form dibawah ini</span>
				<form action="{{ route('pasien.kritikSaranInsert') }}" method="post">
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="input">
									<label for="nama_pelanggan">Nama Anda</label>
									<input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="{{ Auth::user()->name }}" readonly>

									<label for="pesan">Pesan Anda</label>
									<textarea class="form-control" name="pesan" id="pesan" rows="10"></textarea>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-info">Kirim</button>
				</form>
			</div>
    </div>
		@endif
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection