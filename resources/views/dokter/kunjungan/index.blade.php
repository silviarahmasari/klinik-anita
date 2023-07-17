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
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Daftar Kunjungan</h1>
    @if(Auth::user()->isNewPassword == 0 && Auth::user()->role == 'dokter')
      <span style="color: #F23E3E">Ubah password Anda terlebih dahulu</span>
    @else
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No. Antrian</th>
                <th>Tanggal Kunjungan</th>
                <th>Nama Lengkap</th>
                <th>Keluhan</th>
                <th>No Telp</th>
                <th>Pembayaran</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No. Antrian</th>
                <th>Tanggal Kunjungan</th>
                <th>Nama Lengkap</th>
                <th>Keluhan</th>
                <th>No Telp</th>
                <th>Pembayaran</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($kunjungan as $item)
              <tr>
                <td>{{ $item->no_antrian }}</td>
                <td>{{ $item->tgl_kunjungan }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->keluhan }}</td>
                <td>{{ $item->no_telp }}</td>
                <td>@if($item->status_pembayaran === 0) <span class="badge badge-danger">Belum Terbayar</span> @else <span class="badge badge-success">Selesai</span> @endif</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endif
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
