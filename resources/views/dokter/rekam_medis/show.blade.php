@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Rekam Medis</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">ID Pasien : {{ $rekam_medis_pasien[0]->pasien_id }}</h5>
      </div>
      <div class="card-body">
        <h5><strong>Profil Pasien</strong></h5>
        <div class="d-flex w-100">
          <div class="w-50">
            <div class="row">
              <div class="col col-6">
                <label>Nama Lengkap</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->nama_pasien }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>NIK KTP</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->nik }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Tempat, Tanggal Lahir</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->tempat_lahir }}@if($rekam_medis_pasien[0]->rekam_medis_pasien->tanggal_lahir), {{ $rekam_medis_pasien[0]->rekam_medis_pasien->tanggal_lahir }}@endif</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Jenis Kelamin</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->gender }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Alamat Lengkap</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->alamat_pasien }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Agama</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->agama }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Status Perkawinan</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->status_nikah }}</span>
              </div>
            </div>
          </div>
          <div class="w-50">
            <div class="row">
              <div class="col col-6">
                <label>Pendidikan Terakhir</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->pendidikan_terakhir }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Pekerjaan</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->pekerjaan }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Kewarganegaraan</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->kewarganegaraan }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>No. Telp/HP</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->no_telp }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Riwayat Penyakit</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->riwayat_penyakit }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col col-6">
                <label>Riwayat Alergi</label>
              </div>
              <div class="col col-6">
                <span>: {{ $rekam_medis_pasien[0]->rekam_medis_pasien->riwayat_alergi }}</span>
              </div>
            </div>
          </div>
        </div>
        <h5><strong>Form Pemeriksaan Dokter</strong></h5>
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