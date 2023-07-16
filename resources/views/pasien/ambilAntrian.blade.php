@extends('layouts.main')

@section('content')
<style>
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
    <h1 class="h3 mb-3 text-gray-800">Pendaftaran Kunjungan</h1>
    <!-- DataTales Example -->
		@if($checkPasien == 0)
		<span style="color: #F23E3E">Silahkan lengkapi data diri anda terlebih dahulu</span>
		@else
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        Form Data Kunjungan
      </div>
			<div class="card-body">
				<span>Silahkan mengisi data kunjungan terlebih dahulu untuk mendapatkan nomor antrian</span>
				<form action="{{ route('pasien.kunjunganInsert') }}" method="post">
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
                <div class="mb-3 row">
                  <label for="tgl_kunjungan" class="col-sm-4 col-form-label">Tanggal Kunjungan</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control @error('tgl_kunjungan') is-invalid @enderror" name="tgl_kunjungan" id="tgl_kunjungan" value="{{old('tgl_kunjungan')}}">
                    @error('tgl_kunjungan')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="nama_lengkap" class="col-sm-4 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-8">
                    <input type="test" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap" value="{{$pasien->nama_pasien}}" readonly>
                    @error('nama_lengkap')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="triase_tujuan" class="col-sm-4 col-form-label">Triase yang dituju</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('triase_tujuan') is-invalid @enderror" name="triase_tujuan" id="triase_tujuan">
                      <option value="" readonly disabled selected>Pilih triase tujuan</option>
                      <option value="Poli Rawat Inap" {{ old('triase_tujuan') == 'Poli Rawat Inap' ? 'selected' : '' }}>Poli Rawat Inap</option>
                      <option value="IGD" {{ old('triase_tujuan') == 'IGD' ? 'selected' : '' }}>IGD</option>
                      <option value="Poli Kandungan" {{ old('triase_tujuan') == 'Poli Kandungan' ? 'selected' : '' }}>Poli Kandungan</option>
                    </select>
                    @error('triase_tujuan')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
							</div>
              <div class="col-md-6">
                <div class="mb-3 row">
                  <label for="keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                  <div class="col-sm-8">
                    <textarea class="form-control @error('keluhan') is-invalid @enderror" name="keluhan" id="keluhan" rows="2">{{old('keluhan')}}</textarea>
                    @error('keluhan')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="no_telp" class="col-sm-3 col-form-label">No. Telp/HP</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" value="{{$pasien->no_telp}}">
                    @error('no_telp')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
						</div>
					</div>
					<button type="submit" class="btn btn-info">Ambil No. Antrian</button>
				</form>
			</div>
    </div>
		@endif
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection