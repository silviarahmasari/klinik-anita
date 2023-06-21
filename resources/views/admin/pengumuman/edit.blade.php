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
    <h1 class="h3 mb-3 text-gray-800">{{ $pengumuman->nama_obat }}</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <form method="POST" action="{{ route('pengumuman.update', $pengumuman->id) }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="form-group">
            <label for="judul_pengumuman">Judul Pengumuman</label>
            <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" placeholder="Judul Pengumuman" required
              value="{{ $pengumuman->judul_pengumuman }}">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi">{{ $pengumuman->deskripsi }}</textarea>
          </div>
          <div class="form-group">
            <label for="created_at">Tanggal</label>
            <input type="date" class="form-control" id="created_at" name="created_at" placeholder="Tanggal"
              value="{{ $pengumuman->created_at }}">
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            @if ($pengumuman->gambar)
              <div class="col-md-3">
                  <img src="{{ asset('/storage/gambar-pengumuman/' . $pengumuman->gambar) }}"
                      alt="" title="" height="200px">
              </div>
              <div class="col-md-2 justify-content-center">
              </div>
            @endif
            <input id="gambar" name="gambar" onchange="getImagePreview(event, <?php echo $pengumuman->gambar?>)"
              class="form-control" value="{{ $pengumuman->gambar }}"
              type="file">
          </div>
          <button type="submit" class="btn btn-info">Update</button>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection