@extends('layouts.main')

@section('content')
<style>
	.input{
    display: grid;
    grid-template-columns: 200px 500px;
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
    <h1 class="h3 mb-3 text-gray-800">Profile Pasien</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        No. RM :
      </div>
			<div class="card-body">
				<form action="{{ route('pasien.profileInsert') }}" method="post">
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="input">
									<label for="nama_pasien">Nama Lengkap</label>
									<input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" id="nama_pasien" value="{{old('nama_pasien')}}">
									@error('nama_pasien')
                  <label></label>
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

									<label for="nik">NIK KTP</label>
									<input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{old('nik')}}">
									@error('nik')
                  <label></label>
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
                  
									<label for="ttl">Tempat Tanggal Lahir</label>
									<div class="row">
										<div class="col-md-8">
											<input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror " name="tempat_lahir" id="tempat_lahhir" value="{{old('tempat_lahir')}}">
                      @error('tempat_lahir')
                      <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
										</div>

										<div class="col-md-4">
											<input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                      @error('tanggal_lahir')
                      <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
										</div>
									</div>

                  <label for="gender">Jenis kelamin</label>
                  <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                    <option value="" readonly disabled selected>Pilih jenis kelamin</option>
                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                  @error('gender')
                  <label></label>
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

                  <label for="alamat_pasien">Alamat Lengkap</label>
									<textarea class="form-control @error('alamat_pasien') is-invalid @enderror" name="alamat_pasien" id="alamat_pasien" rows="4">{{old('alamat_pasien')}}</textarea>
									@error('alamat_pasien')
                  <label></label>
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

                  <label for="agama">Agama</label>
                  <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                    <option value="" readonly disabled selected>Pilih agama</option>
                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Protestan" {{ old('agama') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Khonghucu" {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                    <option value="Lainnya" {{ old('agama') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                  </select>
                  @error('agama')
                  <label></label>
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

                  <label for="status_nikah">Status Perkawinan</label>
                  <select class="form-control @error('status_nikah') is-invalid @enderror" name="status_nikah" id="status_nikah">
                    <option value="" readonly disabled selected>Pilih status perkawinan</option>
                    <option value="Belum kawin" {{ old('status_nikah') == 'Belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
                    <option value="Kawin" {{ old('status_nikah') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                    <option value="Janda" {{ old('status_nikah') == 'Janda' ? 'selected' : '' }}>Janda</option>
                    <option value="Duda" {{ old('status_nikah') == 'Duda' ? 'selected' : '' }}>Duda</option>
                  </select>
                  @error('status_nikah')
                  <label></label>
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
              <div class="col-md-6">
                <div class="input">
                  <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                  <select class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir" id="pendidikan_terakhir">
                    <option value="" readonly disabled selected>Pilih pendidikan terakhir</option>
                    <option value="Sarjana" {{ old('pendidikan_terakhir') == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                    <option value="Diploma" {{ old('pendidikan_terakhir') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                    <option value="SMA/SMK/MA/MAK" {{ old('pendidikan_terakhir') == 'SMA/SMK/MA/MAK' ? 'selected' : '' }}>SMA/SMK/MA/MAK</option>
                    <option value="SMP/Mts" {{ old('pendidikan_terakhir') == 'SMP/Mts' ? 'selected' : '' }}>SMP/Mts</option>
                    <option value="SD/MI" {{ old('pendidikan_terakhir') == 'SD/MI' ? 'selected' : '' }}>SD/MI</option>
                    <option value="Lainnya" {{ old('pendidikan_terakhir') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                  </select>
                  @error('pendidikan_terakhir')
                  <label></label>
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

                  <label for="pekerjaan">Pekerjaan</label>
                  <select class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan">
                    <option value="" readonly disabled selected>Pilih pekerjaan</option>
                    <option value="ASN" {{ old('pekerjaan') == 'ASN' ? 'selected' : '' }}>ASN</option>
                    <option value="Wiraswasta" {{ old('pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                    <option value="Swasta" {{ old('pekerjaan') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                    <option value="Pelajar" {{ old('pekerjaan') == 'Pelajar' ? 'selected' : '' }}>Pelajar</option>
                    <option value="Lainnya" {{ old('pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                  </select>
                  @error('pekerjaan')
                  <label></label>
                  <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror

                  <label for="kewarganegaraan">Kewarganegaraan</label>
                  <select class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" id="kewarganegaraan">
                    <option value="" readonly disabled selected>Pilih kewarganegaraan</option>
                    <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
                    <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                  </select>
                  @error('kewarganegaraan')
                  <label></label>
                  <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror

                  <label for="penanggung_jawab">Nama Penanggungjawab</label>
                  <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" name="penanggung_jawab" id="penanggung_jawab" value="{{old('penanggung_jawab')}}">
                  @error('penanggung_jawab')
                  <label></label>
                  <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror

                  <label for="no_telp">No. Telp/HP</label>
                  <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" value="{{old('no_telp')}}">
                  @error('no_telp')
                  <label></label>
                  <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror

                  <label for="riwayat_penyakit">Riwayat Penyakit</label>
                  <textarea class="form-control @error('riwayat_penyakit') is-invalid @enderror" name="riwayat_penyakit" id="riwayat_penyakit" rows="2">{{old('riwayat_penyakit')}}</textarea>
                  @error('riwayat_penyakit')
                  <label></label>
                  <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror

                  <label for="riwayat_alergi">Riwayat Alergi</label>
                  <textarea placeholder="isi - bila tidak mempunyai riwayat alergi" class="form-control @error('riwayat_alergi') is-invalid @enderror" name="riwayat_alergi" id="riwayat_alergi" rows="2">{{old('riwayat_alergi')}}</textarea>
                  @error('riwayat_alergi')
                  <label></label>
                  <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
              </div>
						</div>
					</div>
					<button type="submit" class="btn btn-info">Simpan</button>
				</form>
			</div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection