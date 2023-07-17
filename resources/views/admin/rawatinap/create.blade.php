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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Tambah Pasien Rawat Inap Baru</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Form Pasien Rawat Inap</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('rawatinap.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col">
              {{-- <div class="form-group">
                <label for="nama_pasien">Nama Lengkap Pasien</label>
                <input type="text" id="nama_pasien" class="form-control"
                  id="nama_pasien" name="nama_pasien" placeholder="Nama Lengkap Pasien">
              </div> --}}
              {{-- <div class="form-group">
                <label for="tanggal">Kamar</label>
                <select id="id"  class="form-control" name="id_kamar" required>
                  <option value="" disabled selected>Pilih kamar Pasien</option>
                  @foreach($kamar as $key)
                    @if(old('id') == $key->id)
                      <option value="{{ $key->id}}" >{{ $key->nama_kamar}}</option>
                    @else
                      <option value="{{ $key->id}}" >{{ $key->nama_kamar}}</option>
                    @endif
                  @endforeach
                </select>
              </div> --}}
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
                <label for="kamar">Kamar</label>
                <input type="text" id="kamar" class="form-control @error('kamar') is-invalid @enderror"
                  id="kamar" name="kamar" placeholder="Nama Kamar">
                @error('kamar')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="check_in">Check In</label>
                <input type="date" id="check_in" class="form-control @error('check_in') is-invalid @enderror"
                  id="check_in" name="check_in" placeholder="Tanggal" value="{{ old('check_in') }}">
                @error('check_in')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="check_out">Check Out</label>
                <input type="date" id="check_out" class="form-control"
                  id="check_out" name="check_out" placeholder="Tanggal" value="{{ old('check_out') }}">
              </div>
              <div class="form-group">
                <label for="status_pembayaran">Pembayaran</label>
                <input type="text" id="status_pembayaran" class="form-control"
                  id="status_pembayaran" name="status_pembayaran" placeholder="Hanya dikonfirmasi oleh admin (tidak perlu diisi)" value="{{ old('status_pembayaran') }}" readonly>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-info">Tambah</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection