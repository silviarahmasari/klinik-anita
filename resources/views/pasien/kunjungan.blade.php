@extends('layouts.main')

@section('content')
<style>
	h5{
		margin-bottom: 10px;
    font-size: 18px;
    padding-top: 7px;
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
    <h1 class="h3 mb-3 text-gray-800">Daftar Kunjungan</h1>
    <!-- DataTales Example -->
		@if($checkPasien == 0)
		<span style="color: #F23E3E">Silahkan lengkapi data diri anda terlebih dahulu</span>
		@else
		<div class="card shadow mb-2">
			<div class="card-body py-2">
				<a class="btn btn-info float-left" href="{{ Route('pasien.ambilAntrian') }}">Ambil No. Antrian</a>
			</div>
		</div>
		@foreach($kunjungan as $kunjungan)
    <div class="card shadow mb-4">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3 row">
							<label for="tgl_kunjungan" class="col-sm-4 col-form-label">Tanggal Kunjungan</label>
							<div class="col-sm-8">
								<h5>: {{$kunjungan->tgl_kunjungan}}</h5>
							</div>
						</div>

						<div class="mb-3 row">
							<label for="nama_lengkap" class="col-sm-4 col-form-label">Nama Lengkap</label>
							<div class="col-sm-8">
								<h5>: {{$kunjungan->nama_lengkap}}</h5>
							</div>
						</div>

						<div class="mb-3 row">
							<label for="no_telp" class="col-sm-4 col-form-label">Nomor Telepon</label>
							<div class="col-sm-8">
								<h5>: {{$kunjungan->no_telp}}</h5>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3 row">
							<label for="keluhan" class="col-sm-4 col-form-label">Keluhan</label>
							<div class="col-sm-8">
								<h5>: {{$kunjungan->keluhan}}</h5>
							</div>
						</div>

						<div class="mb-3 row">
							<label for="no_antrian" class="col-sm-4 col-form-label">Nomor Antrian Anda</label>
							<div class="col-sm-8">
								<h5>: {{$kunjungan->no_antrian}}</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
		@endforeach
		@endif
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection