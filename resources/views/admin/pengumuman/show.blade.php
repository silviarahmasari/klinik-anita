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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Detail Pengumuman {{ $pengumuman->judul_pengumuman }}</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="font-weight-bold text-primary">Pengumuman</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div>
                        <h5>Judul: {{ $pengumuman->judul_pengumuman }}</h5>
                    </div>
                    <br />
                    <div>
                        <h5>Deskripsi: </h5>
                        <h5>{{ $pengumuman->deskripsi }}</h5>
                    </div>
                    <br />
                    <div>
                        <h5>Tanggal: {{ $pengumuman->tanggal }}</h5>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="form-group ">
                        @if ($pengumuman->gambar)
                            <div class="col-md-3">
                                <img src="{{ asset('/storage/gambar-pengumuman/' . $pengumuman->gambar) }}"
                                    alt="" title="" height="350px">
                            </div>
                            <div class="col-md-2 justify-content-center">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection