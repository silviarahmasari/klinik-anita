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
        <h5 class="font-weight-bold text-primary">Tambah Rekam Medis</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('rekam-medis.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="w-50 px-2">
              <div class="form-group">
                <label for="tgl_pemeriksaan_medis">Tanggal Pemeriksaan</label>
                <input type="date" class="form-control @error('tgl_pemeriksaan_medis') is-invalid @enderror" id="tgl_pemeriksaan_medis"
                  name="tgl_pemeriksaan_medis" value="{{ old('tgl_pemeriksaan_medis') }}">
                @error('tgl_pemeriksaan_medis')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="anamnesa_pemeriksaan_medis">Anamnesa Pemeriksaan Medis</label>
                <textarea id="anamnesa_pemeriksaan_medis" class="form-control @error('anamnesa_pemeriksaan_medis') is-invalid @enderror"
                  id="anamnesa_pemeriksaan_medis" name="anamnesa_pemeriksaan_medis" value="{{ old('anamnesa_pemeriksaan_medis') }}"></textarea>
                @error('anamnesa_pemeriksaan_medis')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              {{-- <div class="form-group">
                <label for="dokter_id">Nama Dokter</label>
                <select class="form-control @error('dokter_id') is-invalid @enderror" id="dokter_id" name="dokter_id">
                  <option value=""> Pilih salah satu</option>
                  @foreach ($dokters as $dokter)
                  <option value="{{ $dokter->id }}">
                    {{ $dokter->nama_dokter }}
                  </option>
                  @endforeach
                </select>
                @error('dokter_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> --}}
              <div class="form-group">
                <label for="obat">Obat</label>
                <select class="js-example-basic-multiple custom-select multiselect-obat" id="obat" name="obat[]" multiple="multiple">
                  <option> Pilih Obat</option>
                  @foreach ($obats as $obat)
                  <option value="{{ $obat->nama_obat  }}">
                    {{ $obat->nama_obat }}
                  </option>
                  @endforeach
                </select>
                @error('obat')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="w-50 px-2">
              <div class="form-group">
                <label for="pasien_id">Nama Pasien</label>
                <select class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id" name="pasien_id">
                  <option value=""> Pilih salah satu</option>
                  @foreach ($pasiens as $pasien)
                  <option value="{{ $pasien->id  }}">
                    {{ $pasien->nama_pasien }}
                  </option>
                  @endforeach
                </select>
                @error('pasien_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="diagnosa">Diagnosa</label>
                <textarea id="diagnosa" class="form-control @error('diagnosa') is-invalid @enderror"
                  id="diagnosa" name="diagnosa" value="{{ old('diagnosa') }}"></textarea>
                @error('diagnosa')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="terapi">Terapi</label>
                <textarea id="terapi" class="form-control @error('terapi') is-invalid @enderror"
                  id="terapi" name="terapi" value="{{ old('terapi') }}"></textarea>
                @error('terapi')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>  
          <button type="submit" class="btn btn-info">Tambah</button>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@endsection
