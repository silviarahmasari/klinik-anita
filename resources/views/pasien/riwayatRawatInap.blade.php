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
    <h1 class="h3 mb-3 text-gray-800">Daftar Riwayat Rawat Inap</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        No. RM: 
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Nominal</th>
                <th>Metode Pembayaran</th>
                <th>Pembayaran</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Kamar</th>
                <th>check In</th>
                <th>Check Out</th>
                <th>Nominal</th>
                <th>Metode Pembayaran</th>
                <th>Pembayaran</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($rawatInap as $rawatInap)
              <tr>
                <td>{{ $rawatInap->kamar }}</td>
                <td>{{ $rawatInap->check_in }}</td>
                <td>{{ $rawatInap->check_out }}</td>
                <td>Rp{{ number_format($rawatInap->nominal) }}</td>
                <td>{{ $rawatInap->metode_pembayaran }}</td>
                @if($rawatInap->status_pembayaran == 'selesai terbayar')
                <td>
                    <span class="badge badge-success">Selesai Terbayar</span>
                </td>
                @else
                <td>
                    <span class="badge badge-danger">Belum Terbayar</span>
                </td>
                @endif
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