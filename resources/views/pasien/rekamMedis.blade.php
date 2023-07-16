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
    <h1 class="h3 mb-3 text-gray-800">Data Rekam Medis</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        No. RM :
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-1 row">
              <label for="nama_pasien" class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->nama_pasien }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="nik" class="col-sm-3 col-form-label">NIK KTP</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->nik }}</h5>
              </div>
            </div>
            
            <div class="mb-1 row">
              <label for="ttl" class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->tempat_lahir }}, {{ $pasien->tanggal_lahir }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="gender" class="col-sm-3 col-form-label">Jenis kelamin</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->gender }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="alamat_pasien" class="col-sm-3 col-form-label">Alamat Lengkap</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->alamat_pasien }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="agama" class="col-sm-3 col-form-label">Agama</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->agama }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="status_nikah" class="col-sm-3 col-form-label">Status Perkawinan</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->status_nikah }}</h5>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-1 row">
              <label for="pendidikan_terakhir" class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->pendidikan_terakhir }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->pekerjaan }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->kewarganegaraan }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="penanggung_jawab" class="col-sm-4 col-form-label">Nama Penanggungjawab</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->penanggung_jawab }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="no_telp" class="col-sm-4 col-form-label">No. Telp/HP</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->no_telp }}</h5>                  
              </div>
            </div>

            <div class="mb-1 row">
              <label for="riwayat_penyakit" class="col-sm-4 col-form-label">Riwayat Penyakit</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->riwayat_penyakit }}</h5>
              </div>
            </div>

            <div class="mb-1 row">
              <label for="riwayat_alergi" class="col-sm-4 col-form-label">Riwayat Alergi</label>
              <div class="col-sm-8">
                <h5>: {{ $pasien->riwayat_alergi }}</h5>
              </div>
            </div>
          </div>
        </div>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        <h5 class="mt-4"><strong>Form Pemeriksaan Dokter</strong></h5>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Tgl Pemeriksaan</th>
                <th>Anamnesa/Pemeriksaan Medis</th>
                <th>Diagnosa</th>
                <th>Terapi</th>
                <th>Obat</th>
                <th>Nama Dokter</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Tgl Pemeriksaan</th>
                <th>Anamnesa/Pemeriksaan Medis</th>
                <th>Diagnosa</th>
                <th>Terapi</th>
                <th>Obat</th>
                <th>Nama Dokter</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($rekam_medis_pasien as $rekam_medis)
              <tr>
                <td>{{ $rekam_medis->tgl_pemeriksaan_medis }}</td>
                <td>{{ $rekam_medis->anamnesa_pemeriksaan_medis }}</td>
                <td>{{ $rekam_medis->diagnosa }}</td>
                <td>{{ $rekam_medis->terapi }}</td>
                <td>{{ $rekam_medis->obat }}</td>
                <td>{{ $rekam_medis->rekam_medis_dokter->nama_dokter }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection