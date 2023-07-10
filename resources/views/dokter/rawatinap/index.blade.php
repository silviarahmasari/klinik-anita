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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Daftar Pasien Rawat Inap</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Daftar Pasien Rawat Inap
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Status Pembayaran</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Status Pembayaran</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($rawat as $data)
              <tr>
                <td>{{ $data->no_rm }}</td>
                <td>{{ $data->nama_pasien }}</td>
                <td>{{ $data->nama_kamar }}</td>
                <td>{{ $data->check_in }}</td>
                <td>{{ $data->check_out }}</td>
                <td>{{ $data->status_pembayaran }}</td>
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

@foreach ($rawat as $data)
<!-- Modal -->
<div class="modal fade" id="ModalConfirmation-{{$data->id_rawat}}" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Apakah Pasien Sudah Melakukan Pembayaran?
          </div>
          <div class="modal-footer">
            <form action="{{ URL::to('rawatinap/verif/' . $data->id_rawat) }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group row col-auto">
                <button class="btn btn-success" type="submit"><input class="btn btn-success" value="selesai terbayar" id="statusverif" name="status_pembayaran" hidden>Sudah</button>
            </div>
            </form>
            <form action="{{ URL::to('rawatinap/verif/' . $data->id_rawat) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group row col-auto">
                <button class="btn btn-danger" type="submit"><input class="btn btn-danger" value="belum terbayar" id="statusunverif"name="status_pembayaran" hidden>Belum</button>
            </div>
            </form>
          </div>
      </div>
  </div>
</div>
@endforeach
@section('custom_script')
    <script src="{{ asset('assets/js/bootstrap-modal.js') }}"></script>
@endsection
