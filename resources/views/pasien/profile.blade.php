@extends('layouts.main')

@section('content')
<style>
	.input{
    display: grid;
    grid-template-columns: 200px 500px;
  }
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
  @if($checkPasien == 0)
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
                <div class="mb-3 row">
                  <label for="nama_pasien" class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" id="nama_pasien" value="{{ Auth::user()->name }}" readonly>
                    @error('nama_pasien')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="nik" class="col-sm-3 col-form-label">NIK KTP</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{old('nik')}}">
                    @error('nik')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <label for="ttl" class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-md-8">
                        <input type="text" class="mb-2 mb-md-0 mb-lg-0 form-control @error('tempat_lahir') is-invalid @enderror " name="tempat_lahir" id="tempat_lahhir" value="{{old('tempat_lahir')}}">
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
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="gender" class="col-sm-3 col-form-label">Jenis kelamin</label>
                  <div class="col-sm-9">
                    <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                      <option value="" readonly disabled selected>Pilih jenis kelamin</option>
                      <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                      <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="alamat_pasien" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                  <div class="col-sm-9">
                    <textarea class="form-control @error('alamat_pasien') is-invalid @enderror" name="alamat_pasien" id="alamat_pasien" rows="4">{{old('alamat_pasien')}}</textarea>
                    @error('alamat_pasien')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                  <div class="col-sm-9">
                    <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                      <option value="" readonly disabled selected>Pilih agama</option>
                      <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                      <option value="Protestan" {{ old('agama') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                      <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                      <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                      <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                      <option value="Khonghucu" {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                      <option value="Lainnya" {{ old('agama') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('agama')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="status_nikah" class="col-sm-3 col-form-label">Status Perkawinan</label>
                  <div class="col-sm-9">
                    <select class="form-control @error('status_nikah') is-invalid @enderror" name="status_nikah" id="status_nikah">
                      <option value="" readonly disabled selected>Pilih status perkawinan</option>
                      <option value="Belum kawin" {{ old('status_nikah') == 'Belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
                      <option value="Kawin" {{ old('status_nikah') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                      <option value="Janda" {{ old('status_nikah') == 'Janda' ? 'selected' : '' }}>Janda</option>
                      <option value="Duda" {{ old('status_nikah') == 'Duda' ? 'selected' : '' }}>Duda</option>
                    </select>
                    @error('status_nikah')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
							</div>
              <div class="col-md-6">
                <div class="mb-3 row">
                  <label for="pendidikan_terakhir" class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir" id="pendidikan_terakhir">
                      <option value="" readonly disabled selected>Pilih pendidikan terakhir</option>
                      <option value="Sarjana" {{ old('pendidikan_terakhir') == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                      <option value="Diploma" {{ old('pendidikan_terakhir') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                      <option value="SMA/SMK/MA/MAK" {{ old('pendidikan_terakhir') == 'SMA/SMK/MA/MAK' ? 'selected' : '' }}>SMA/SMK/MA/MAK</option>
                      <option value="SMP/MTs" {{ old('pendidikan_terakhir') == 'SMP/MTs' ? 'selected' : '' }}>SMP/MTs</option>
                      <option value="SD/MI" {{ old('pendidikan_terakhir') == 'SD/MI' ? 'selected' : '' }}>SD/MI</option>
                      <option value="Lainnya" {{ old('pendidikan_terakhir') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('pendidikan_terakhir')
                    <span class="invalid-feedback">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan">
                      <option value="" readonly disabled selected>Pilih pekerjaan</option>
                      <option value="ASN" {{ old('pekerjaan') == 'ASN' ? 'selected' : '' }}>ASN</option>
                      <option value="Wiraswasta" {{ old('pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                      <option value="Swasta" {{ old('pekerjaan') == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                      <option value="Pelajar" {{ old('pekerjaan') == 'Pelajar' ? 'selected' : '' }}>Pelajar</option>
                      <option value="Lainnya" {{ old('pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('pekerjaan')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" id="kewarganegaraan">
                      <option value="" readonly disabled selected>Pilih kewarganegaraan</option>
                      <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
                      <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                    </select>
                    @error('kewarganegaraan')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="penanggung_jawab" class="col-sm-4 col-form-label">Nama Penanggungjawab</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" name="penanggung_jawab" id="penanggung_jawab" value="{{old('penanggung_jawab')}}">
                    @error('penanggung_jawab')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="no_telp " class="col-sm-4 col-form-label">No. Telp/HP</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" value="{{old('no_telp')}}">
                    @error('no_telp')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="riwayat_penyakit" class="col-sm-4 col-form-label">Riwayat Penyakit</label>
                  <div class="col-sm-8">
                    <textarea placeholder="isi - bila tidak mempunyai riwayat penyakit" class="form-control @error('riwayat_penyakit') is-invalid @enderror" name="riwayat_penyakit" id="riwayat_penyakit" rows="2">{{old('riwayat_penyakit')}}</textarea>
                    @error('riwayat_penyakit')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="riwayat_alergi" class="col-sm-4 col-form-label">Riwayat Alergi</label>
                  <div class="col-sm-8">
                    <textarea placeholder="isi - bila tidak mempunyai riwayat alergi" class="form-control @error('riwayat_alergi') is-invalid @enderror" name="riwayat_alergi" id="riwayat_alergi" rows="2">{{old('riwayat_alergi')}}</textarea>
                    @error('riwayat_alergi')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
						</div>
					</div>
					<button type="submit" class="btn btn-info">Simpan</button>
				</form>
			</div>
    </div>
  </div>
  @else
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Data Profile</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        No. RM :
      </div>
			<div class="card-body">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3 row">
                <label for="nama_pasien" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->nama_pasien }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="nik" class="col-sm-3 col-form-label">NIK KTP</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->nik }}</h5>
                </div>
              </div>
              
              <div class="mb-3 row">
                <label for="ttl" class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->tempat_lahir }}, {{ $pasien->tanggal_lahir }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="gender" class="col-sm-3 col-form-label">Jenis kelamin</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->gender }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="alamat_pasien" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->alamat_pasien }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->agama }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="status_nikah" class="col-sm-3 col-form-label">Status Perkawinan</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->status_nikah }}</h5>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3 row">
                <label for="pendidikan_terakhir" class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->pendidikan_terakhir }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->pekerjaan }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->kewarganegaraan }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="penanggung_jawab" class="col-sm-4 col-form-label">Nama Penanggungjawab</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->penanggung_jawab }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="no_telp" class="col-sm-4 col-form-label">No. Telp/HP</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->no_telp }}</h5>                  
                </div>
              </div>

              <div class="mb-3 row">
                <label for="riwayat_penyakit" class="col-sm-4 col-form-label">Riwayat Penyakit</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->riwayat_penyakit }}</h5>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="riwayat_alergi" class="col-sm-4 col-form-label">Riwayat Alergi</label>
                <div class="col-sm-8">
                  <h5>: {{ $pasien->riwayat_alergi }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
			</div>
    </div>

    <h1 class="h3 mb-3 text-gray-800">Edit Data Profile</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        No. RM :
      </div>
			<div class="card-body">
				<form action="{{ route('pasien.profileUpdate', $pasien->id) }}" method="post">
					@csrf
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
                <div class="mb-3 row">
                  <label for="nama_pasien" class="col-sm-4 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" id="nama_pasien" value="{{ $pasien->nama_pasien }}">
                    @error('nama_pasien')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="nik" class="col-sm-4 col-form-label">NIK KTP</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ $pasien->nik }}">
                    @error('nik')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <label for="ttl" class="col-sm-4 col-form-label">Tempat Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <div class="row">
                      <div class="col-md-8">
                        <input type="text" class="mb-2 mb-md-0 mb-lg-0 form-control @error('tempat_lahir') is invalid @enderror" name="tempat_lahir" id="tempat_lahhir" value="{{ $pasien->tempat_lahir }}">
                        @error('tempat_lahir')
                        <span class="invalid-feedback">
                          <strong>{{$message}}</strong>
                        </span>
                        @enderror
                      </div>
    
                      <div class="col-md-4">
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="gender" class="col-sm-4 col-form-label">Jenis kelamin</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="gender" id="gender">
                      @if($pasien->gender == 'Laki-laki')
                      <option selected value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                      @else
                      <option value="Laki-laki">Laki-laki</option>
                      <option selected value="Perempuan">Perempuan</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="alamat_pasien" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                  <div class="col-sm-8">
                    <textarea class="form-control @error('alamat_pasien') is-invalid @enderror" name="alamat_pasien" id="alamat_pasien" rows="4">{{ $pasien->alamat_pasien }}</textarea>                    
                    @error('alamat_pasien')
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                      @if($pasien->agama == 'Islam')
                      <option selected value="Islam">Islam</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Khonghucu">Khonghucu</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->agama == 'Protestan')
                      <option value="Islam">Islam</option>
                      <option selected value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Khonghucu">Khonghucu</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->agama == 'Katolik')
                      <option value="Islam">Islam</option>
                      <option value="Protestan">Protestan</option>
                      <option selected value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Khonghucu">Khonghucu</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->agama == 'Hindu')
                      <option value="Islam">Islam</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option selected value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Khonghucu">Khonghucu</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->agama == 'Buddha')
                      <option value="Islam">Islam</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option selected value="Buddha">Buddha</option>
                      <option value="Khonghucu">Khonghucu</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->agama == 'Khonghucu')
                      <option value="Islam">Islam</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option selected value="Khonghucu">Khonghucu</option>
                      <option value="Lainnya">Lainnya</option>
                      @else
                      <option value="Islam">Islam</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Khonghucu">Khonghucu</option>
                      <option selected value="Lainnya">Lainnya</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="status_nikah" class="col-sm-4 col-form-label">Status Perkawinan</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('status_nikah') is-invalid @enderror" name="status_nikah" id="status_nikah">
                      @if($pasien->status_nikah == 'Belum kawin')
                      <option selected value="Belum kawin">Belum Kawin</option>
                      <option value="Kawin">Kawin</option>
                      <option value="Janda">Janda</option>
                      <option value="Duda">Duda</option>
                      @elseif($pasien->status_nikah == 'Kawin')
                      <option value="Belum kawin">Belum Kawin</option>
                      <option selected value="Kawin">Kawin</option>
                      <option value="Janda">Janda</option>
                      <option value="Duda">Duda</option>
                      @elseif($pasien->status_nikah == 'Janda')
                      <option value="Belum kawin">Belum Kawin</option>
                      <option value="Kawin">Kawin</option>
                      <option selected value="Janda">Janda</option>
                      <option value="Duda">Duda</option>
                      @else
                      <option value="Belum kawin">Belum Kawin</option>
                      <option value="Kawin">Kawin</option>
                      <option value="Janda">Janda</option>
                      <option selected value="Duda">Duda</option>
                      @endif
                    </select>
                  </div>
                </div>
							</div>
              <div class="col-md-6">
                <div class="mb-3 row">
                  <label for="pendidikan_terakhir" class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir" id="pendidikan_terakhir">
                      @if($pasien->pendidikan_terakhir == 'Sarjana')
                      <option selected value="Sarjana">Sarjana</option>
                      <option value="Diploma">Diploma</option>
                      <option value="SMA/SMK/MA/MAK">SMA/SMK/MA/MAK</option>
                      <option value="SMP/MTs">SMP/MTs</option>
                      <option value="SD/MI">SD/MI</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->pendidikan_terakhir == 'Diploma')
                      <option value="Sarjana">Sarjana</option>
                      <option selected value="Diploma">Diploma</option>
                      <option value="SMA/SMK/MA/MAK">SMA/SMK/MA/MAK</option>
                      <option value="SMP/MTs">SMP/MTs</option>
                      <option value="SD/MI">SD/MI</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->pendidikan_terakhir == 'SMA/SMK/MA/MAK')
                      <option value="Sarjana">Sarjana</option>
                      <option value="Diploma">Diploma</option>
                      <option selected value="SMA/SMK/MA/MAK">SMA/SMK/MA/MAK</option>
                      <option value="SMP/MTs">SMP/MTs</option>
                      <option value="SD/MI">SD/MI</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->pendidikan_terakhir == 'SMP/MTs')
                      <option value="Sarjana">Sarjana</option>
                      <option value="Diploma">Diploma</option>
                      <option value="SMA/SMK/MA/MAK">SMA/SMK/MA/MAK</option>
                      <option selected value="SMP/MTs">SMP/MTs</option>
                      <option value="SD/MI">SD/MI</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->pendidikan_terakhir == 'SD/MI')
                      <option value="Sarjana">Sarjana</option>
                      <option value="Diploma">Diploma</option>
                      <option value="SMA/SMK/MA/MAK">SMA/SMK/MA/MAK</option>
                      <option value="SMP/MTs">SMP/MTs</option>
                      <option selected value="SD/MI">SD/MI</option>
                      <option value="Lainnya">Lainnya</option>
                      @else
                      <option value="Sarjana">Sarjana</option>
                      <option value="Diploma">Diploma</option>
                      <option value="SMA/SMK/MA/MAK">SMA/SMK/MA/MAK</option>
                      <option value="SMP/MTs">SMP/MTs</option>
                      <option value="SD/MI">SD/MI</option>
                      <option selected value="Lainnya">Lainnya</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan">
                      @if($pasien->pekerjaan == 'ASN')
                      <option selected value="ASN">ASN</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Swasta">Swasta</option>
                      <option value="Pelajar">Pelajar</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->pekerjaan == 'Wiraswasta')
                      <option value="ASN">ASN</option>
                      <option selected value="Wiraswasta">Wiraswasta</option>
                      <option value="Swasta">Swasta</option>
                      <option value="Pelajar">Pelajar</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->pekerjaan == 'Swasta')
                      <option value="ASN">ASN</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option selected value="Swasta">Swasta</option>
                      <option value="Pelajar">Pelajar</option>
                      <option value="Lainnya">Lainnya</option>
                      @elseif($pasien->pekerjaan == 'Pelajar')
                      <option value="ASN">ASN</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Swasta">Swasta</option>
                      <option selected value="Pelajar">Pelajar</option>
                      <option value="Lainnya">Lainnya</option>
                      @else
                      <option value="ASN">ASN</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Swasta">Swasta</option>
                      <option value="Pelajar">Pelajar</option>
                      <option selected value="Lainnya">Lainnya</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
                  <div class="col-sm-8">
                    <select class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" id="kewarganegaraan">
                      @if($pasien->kewarganegaraan == 'WNI')
                      <option selected value="WNI">WNI</option>
                      <option value="WNA">WNA</option>
                      @else
                      <option selected value="WNA">WNA</option>
                      <option value="WNI">WNI</option>
                      @endif
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="penanggung_jawab" class="col-sm-4 col-form-label">Nama Penanggungjawab</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" name="penanggung_jawab" id="penanggung_jawab" value="{{ $pasien->penanggung_jawab }}">
                    @error('penanggung_jawab')
                    <label></label>
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="no_telp" class="col-sm-4 col-form-label">No. Telp/HP</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" value="{{ $pasien->no_telp }}">
                    @error('no_telp')
                    <label></label>
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="riwayat_penyakit" class="col-sm-4 col-form-label">Riwayat Penyakit</label>
                  <div class="col-sm-8">
                    <textarea class="form-control @error('riwayat_penyakit') is-invalid @enderror" name="riwayat_penyakit" id="riwayat_penyakit" rows="2">{{ $pasien->riwayat_penyakit }}</textarea>
                    @error('riwayat_penyakit')
                    <label></label>
                    <span class="invalid-feedback">
                      <strong>{{$message}}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="riwayat_alergi" class="col-sm-4 col-form-label">Riwayat Alergi</label>
                  <div class="col sm-8">
                    <textarea class="form-control @error('riwayat_alergi') is-invalid @enderror" name="riwayat_alergi" id="riwayat_alergi" rows="2">{{ $pasien->riwayat_penyakit }}</textarea>
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
					</div>
					<button type="submit" class="btn btn-info">Simpan</button>
				</form>
			</div>
    </div>
  </div>
  @endif
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection