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
        <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Tambah Pasien</h1>
        <p class="mb-4">Isi formulir pendaftaran berikut untuk menambahkan pasien baru</p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                <h5 class="font-weight-bold text-primary">Masukan User</h5>
            </div> --}}
            <div class="card-body">
                <form action="{{ route('admin-pasien.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="dokter_id" name="dokter_id" value="1">
                    <div class="form-group px-4">
                        <label><strong>No. RM</strong></label>
                        <input type="text" class="form-control @error('no_rm') is-invalid @enderror" id="no_rm" name="no_rm"
                        placeholder="No RM" value="{{ old('no_rm') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <hr>
                    <div class="row px-4">
                        <div class="col-6 col-sm-6 col-lg-6 px-3">
                            <div class="form-group">
                                <label>Pilih Pasien</label>
                                <select name="nama_pasien" id="nama_pasien" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Pasien --</option>
                                    @foreach($user as $pasien)
                                        <option value="{{ $pasien->name }}" class="form-control">{{ $pasien->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap"
                                placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIK KTP</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                                placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group px-1">
                                <label>Tempat, Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-lg-6 px-2">
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir"
                                        placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-sm-6 col-lg-6 px-2">
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir"
                                        placeholder="Tempat Lahir" value="{{ old('tanggal_lahir') }}">
                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat_pasien" name="alamat_pasien"
                                placeholder="Nomor Induk Kependudukan" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Perkawinan</label>
                                <select name="status_nikah" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Status --</option>
                                    <option value="Belum kawin">Belum kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Janda">Janda</option>
                                    <option value="Duda">Duda</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select name="pekerjaan" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Pekerjaan --</option>
                                    <option value="ASN">ASN</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Swasta">Swasta</option>
                                    <option value="Pelajar">Pelajar</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-lg-6 px-3">
                            <div class="form-group">
                                <label>Kewarganegaraan</label>
                                <select name="kewarganegaraan" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Pekerjaan --</option>
                                    <option value="WNA">WNA</option>
                                    <option value="WNI">WNI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select name="pendidikan_terakhir" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Pendidikan --</option>
                                    <option value="SD/MI">SD/MI</option>
                                    <option value="SMP/MTs">SMP/MTs</option>
                                    <option value="SMA/SMK/MA/MAK">SMA/SMK/MA/MAK</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Sarjana">Sarjana</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cara Pembayaran</label>
                                <select name="id_pembayaran" id="id_pembayaran" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Metode Pembayaran --</option>
                                    @foreach($metode_bayar as $metode)
                                        <option value="{{ $metode->id }}" class="form-control">{{ $metode->nama_metode }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Penanggung Jawab</label>
                                <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab"
                                placeholder="Nama Penanggung Jawab" value="{{ old('penanggung_jawab') }}">
                                @error('penanggung_jawab')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No. Telp/HP Aktif</label>
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp"
                                placeholder="No. Telp/HP Aktif" value="{{ old('no_telp') }}">
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Triase yang dituju</label>
                                <select name="triase_tujuan" class="form-control">
                                    <option value="@php null @endphp">-- Pilih Triase --</option>
                                    <option value="IGD">IGD</option>
                                    <option value="Poli Rawat Inap">Poli Rawat Inap</option>
                                    <option value="Poli Kandungan">Poli Kandungan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Riwayat Penyakit</label>
                                <input type="text" class="form-control @error('riwayat_penyakit') is-invalid @enderror" id="riwayat_penyakit" name="riwayat_penyakit"
                                placeholder="Sebutkan riwayat penyakit yang Anda Miliki" value="{{ old('riwayat_penyakit') }}">
                                @error('riwayat_penyakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Riwayat Alergi</label>
                                <input type="text" class="form-control @error('riwayat_alergi') is-invalid @enderror" id="riwayat_alergi" name="riwayat_alergi"
                                placeholder="Sebutkan riwayat alergi yang Anda Miliki" value="{{ old('riwayat_alergi') }}">
                                @error('riwayat_alergi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info m-4">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
