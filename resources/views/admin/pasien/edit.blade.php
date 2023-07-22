@extends('layouts.main')

@section('content')
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
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
  <!-- egin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Profil Pasien</h1>
    <p class="mb-4">Update formulir pendaftaran berikut untuk menegubah data pasien</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Pasien</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('admin-pasien.update', $pasien->id) }}" method="post">
          @method('PUT')
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
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection