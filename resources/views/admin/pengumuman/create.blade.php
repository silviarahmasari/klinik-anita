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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Pengumuman</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Tambah Pengumuman</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pengumuman.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama_obat">Judul Pengumuman</label>
            <input type="text" class="form-control" id="judul_pengumuman"
              name="judul_pengumuman" placeholder="Judul Pengumuman">
            @error('judul_pengumuman')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea type="text" id="deskripsi" class="form-control"
              id="deskripsi" name="deskripsi" placeholder="Deskripsi">
            </textarea>
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="Date" id="tanggal" class="form-control"
              id="tanggal" name="tanggal" placeholder="Tanggal" value="{{ old('tanggal') }}">
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" id="gambar" class="form-control"
              id="gambar" name="gambar" placeholder="Tanggal" value="{{ old('gambar') }}">
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