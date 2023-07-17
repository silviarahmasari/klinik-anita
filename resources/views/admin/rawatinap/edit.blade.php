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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Edit Pasien Rawat Inap</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Form Pasien Rawat Inap</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('rawatinap.update', $rawat->id) }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="row">
            <div class="col">
              {{-- <div class="form-group">
                <label for="no_rm">No. Rekam Medis</label>
                <input type="text" class="form-control" id="no_rm"
                  name="no_rm" placeholder="Nomor Rekam Medis" value="{{ $rawat->no_rm }}">
              </div> --}}
              <div class="form-group">
                <label for="nama_pasien">Nama Lengkap Pasien</label>
                <input type="text" id="nama_pasien" class="form-control"
                  id="nama_pasien" name="nama_pasien" placeholder="Nama Lengkap Pasien" value="{{ $rawat->nama_pasien }}" readonly>
              </div>
              <div class="form-group">
                <label for="kamar">Kamar</label>
                <input type="text" id="kamar" class="form-control"
                  id="kamar" name="kamar" placeholder="Tanggal" value="{{ $rawat->kamar }}">
              </div>
              {{-- <div class="form-group">
                <label for="tanggal">Kamar</label>
                <select id="id"  class="form-control" name="id_kamar" value="{{ $rawat->id_kamar }}">
                  @foreach ($kamar as $key)
                    <option value="{{ $key->id}}" {{ old('id_kamar') == $key->id ? 'selected' : '' }}selected>{{$key->nama_kamar}}</option>                    
                  @endforeach 
                </select>
              </div> --}}
            </div>
            <div class="col">
              <div class="form-group">
                <label for="check_in">Check In</label>
                <input type="date" id="check_in" class="form-control"
                  id="check_in" name="check_in" placeholder="Tanggal" value="{{ $rawat->check_in }}">
              </div>
              <div class="form-group">
                <label for="check_out">Check Out</label>
                <input type="date" id="check_out" class="form-control"
                  id="check_out" name="check_out" placeholder="Tanggal" value="{{ $rawat->check_out }}">
              </div>
              <div class="form-group">
                <label for="status_pembayaran">Pembayaran</label>
                <input type="text" id="status_pembayaran" class="form-control"
                  id="status_pembayaran" name="status_pembayaran" placeholder="Hanya dikonfirmasi oleh admin (tidak perlu diisi)" value="{{ $rawat->status_pembayaran }}" readonly>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-info">Update</button>
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