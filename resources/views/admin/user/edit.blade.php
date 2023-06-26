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
        <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Profil Pasien</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="font-weight-bold text-primary">Edit Data Pasien
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin-pasien.update', $pasien->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                {{-- <input type="hidden" name="{{ $users->id }}" value="{{ $users->id }}"> --}}
                <div class="form-group px-4">
                    <label for="no_rm"><strong>No. RM</strong></label>
                    <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="No RM"
                    value="{{ $pasien->no_rm }}">
                </div>
                <hr>
                <div class="row px-4">
                    <div class="col-6 col-sm-6 col-lg-6 px-3">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                            value="{{ $pasien->nama_pasien }}">
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK KTP</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nomor Induk Kependudukan"
                            value="{{ $pasien->nik }}">
                        </div>
                        <div class="form-group px-1">
                            <label for="ttl">Tempat, Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 px-2">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Tempat Lahir" value="{{ $pasien->tempat_lahir }}">
                                </div>
                                <div class="col-6 col-sm-6 col-lg-6 px-2">
                                    <input type="date" class="form-control" id="name" name="name" placeholder="Tanggal Lahir" value="{{ $pasien->tanggal_lahir }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender[]" class="form-control">
                                <option value="@php null @endphp">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" @if ($pasien->gender === "Laki-laki") selected @endif>Laki-Laki</option>
                                <option value="Perempuan" @if ($pasien->gender === "Perempuan") selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pasien"
                            value="{{ $pasien->alamat_pasien }}">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama[]" class="form-control">
                                <option value="@php null @endphp">-- Pilih Agama --</option>
                                <option value="Islam" @if ($pasien->agama === "Islam") selected @endif>Islam</option>
                                <option value="Protestan" @if ($pasien->agama === "Protestan") selected @endif>Protestan</option>
                                <option value="Katolik" @if ($pasien->agama === "Katolik") selected @endif>Katolik</option>
                                <option value="Hindu" @if ($pasien->agama === "Hindu") selected @endif>Hindu</option>
                                <option value="Buddha" @if ($pasien->agama === "Buddha") selected @endif>Buddha</option>
                                <option value="Khonghucu" @if ($pasien->agama === "Khonghucu") selected @endif>Khonghucu</option>
                                <option value="Lainnya" @if ($pasien->agama === "Lainnya") selected @endif>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marital_status">Status Perkawinan</label>
                            <select name="marital_status[]" class="form-control">
                                <option value="@php null @endphp">-- Pilih Status Kawin --</option>
                                <option value="Belum kawin" @if ($pasien->status_nikah === "Belum kawin") selected @endif>Belum kawin</option>
                                <option value="Kawin" @if ($pasien->status_nikah === "Kawin") selected @endif>Kawin</option>
                                <option value="Janda" @if ($pasien->status_nikah === "Janda") selected @endif>Janda</option>
                                <option value="Duda" @if ($pasien->status_nikah === "Duda") selected @endif>Duda</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="jobs">Pekerjaan</label>
                                <select name="jobs[]" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Pekerjaan --</option>
                                    <option value="ASN" @if ($pasien->pekerjaan === "ASN") selected @endif>ASN</option>
                                    <option value="Wiraswasta" @if ($pasien->pekerjaan === "Wiraswasta") selected @endif>Wiraswasta</option>
                                    <option value="Swasta" @if ($pasien->pekerjaan === "Swasta") selected @endif>Swasta</option>
                                    <option value="Pelajar" @if ($pasien->pekerjaan === "Pelajar") selected @endif>Pelajar</option>
                                    <option value="Lainnya" @if ($pasien->pekerjaan === "Lainnya") selected @endif>Lainny</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-6 col-sm-6 col-lg-6 px-3">
                            <div class="form-group">
                            <label for="email">Kewarganegaraan</label>
                                <select name="nationality[]" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Kewarganegaraan --</option>
                                    <option value="WNA" @if ($pasien->kewarganegaraan === "WNA") selected @endif>WNA</option>
                                    <option value="WNI" @if ($pasien->kewarganegaraan === "WNI") selected @endif>WNI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Pendidikan Terakhir</label>
                                <select name="latest_education[]" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Pendidikan --</option>
                                    <option value="SD/MI" @if ($pasien->pendidikan_terakhir === "SD/MI") selected @endif>SD/MI</option>
                                    <option value="SMP/MTs" @if ($pasien->pendidikan_terakhir === "SMP/MTs") selected @endif>SMP/MTs</option>
                                    <option value="SMA/SMK/MA/MAK" @if ($pasien->pendidikan_terakhir === "SMA/SMK/MA/MAK") selected @endif>SMA/SMK/MA/MAK</option>
                                    <option value="Diploma" @if ($pasien->pendidikan_terakhir === "Diploma") selected @endif>Diploma</option>
                                    <option value="Sarjana" @if ($pasien->pendidikan_terakhir === "Sarjana") selected @endif>Sarjana</option>
                                    <option value="Lainnya" @if ($pasien->pendidikan_terakhir === "Lainnya") selected @endif>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="metode_bayar">Cara Pembayaran</label>
                                <select name="id_pembayaran" id="id_pembayaran" class="form-control">
                                    {{-- @foreach($bayar as $metode)
                                        <option value="{{ $metode->id }}" class="form-control" @if ($user->id_role === $roles->id) selected @endif>{{ $roles->role_name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="penanggung_jawab">Nama Penanggung Jawab</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Nama Penanggung Jawab"
                                value="{{ $pasien->penanggung_jawab }}">
                            </div>
                            <div class="form-group">
                                <label for="telp">No. Telp/HP</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp/HP Aktif"
                                value="{{ $pasien->no_telp }}">
                            </div>
                            <div class="form-group">
                                <label for="triase">Triase yang dituju</label>
                                <select name="triase[]" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Triase --</option>
                                    <option value="IGD" @if ($pasien->triase_tujuan === "IGD") selected @endif>IGD</option>
                                    <option value="Poli Rawat Inap" @if ($pasien->triase_tujuan === "Poli Rawat Inap") selected @endif>Poli Rawat Inap</option>
                                    <option value="Poli Kandungan" @if ($pasien->triase_tujuan === "Poli Kandungan") selected @endif>Poli Kandungan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="riwayat_penyakit">Riwayat Penyakit</label>
                                <input type="text" class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" placeholder="Riwayat Penyakit"
                                value="{{ $pasien->riwayat_penyakit }}">
                            </div>
                            <div class="form-group">
                                <label for="riwayat_alergi">Riwayat Alergi</label>
                                <input type="text" class="form-control" id="riwayat_alergi" name="riwayat_alergi" placeholder="Email User"
                                value="{{ $pasien->riwayat_alergi }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info m-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
