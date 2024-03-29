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
          <span>
            <a href="{{ route('rawatinap.create') }}" class="btn ml-4 btn-primary font-weight-bold">
              + Tambah Rawat Inap
            </a>
          </span>
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Pasien</th>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Nominal</th>
                <th>Metode Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nama Pasien</th>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Nominal</th>
                <th>Metode Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($rawat as $data)
              <tr>
                <td>{{ $data->nama_pasien }}</td>
                <td>{{ $data->kamar }}</td>
                <td>{{ $data->check_in }}</td>
                <td>{{ $data->check_out }}</td>
                <td>Rp{{ number_format($data->nominal) }}</td>
                <td>{{ $data->metode_pembayaran }}</td>
                <td>{{ $data->status_pembayaran }}</td>
                <td>
                  <span><a data-toggle="modal" data-target="#ModalConfirmation-{{$data->id}}" class="btn btn-primary">Verify</a></span>
                  <span><a href="{{ route('rawatinap.edit', $data->id) }}" class="btn btn-warning">Edit</a></span>
                  <form action="{{ route('rawatinap.destroy', $data->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <span><button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block"
                        type="submit">Hapus</button></span>
                  </form>
                </td>
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
<div class="modal fade" id="ModalConfirmation-{{$data->id}}" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ URL::to('rawatinap/verif/' . $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            Nominal Bayar:
            <input type="number" class="form-control" name="nominal" required>
            Metode Pembayaran
            <select class="form-control" name="metode_pembayaran" id="metode_pembayaran" required>
              <option value="Cash">Cash</option>
              <option value="Debit">Debit</option>
            </select><br>
            Apakah Pasien sudah melakukan pembayaran sesuai dengan nominal di atas?
          </div>
          <div class="modal-footer">
            <div class="form-group">
                <button class="btn btn-success" type="submit"><input class="btn btn-success" value="selesai terbayar" id="statusverif" name="status_pembayaran" hidden>Sudah</button>
            </div>
            </form>
            <form action="{{ URL::to('rawatinap/verif/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group row col-auto my-2">
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
