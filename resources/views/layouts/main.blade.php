<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Klinik Dr. Anita</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-hospital-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>Klinik <br>Dr. Anita</sup></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-chart-line"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>
      @if (Auth::user()->role == 'dokter')
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataProfile"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-user-injured"></i> <span>Data Profile</span>
        </a>
        <div id="dataProfile" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('dokter-profile.edit', Auth::user()->id) }}">Profile</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRekamMedis" aria-expanded="true"
          aria-controls="collapseRekamMedis">
          <i class="fas fa-file-invoice"></i>
          <span>Pengelolaan Rekam Medis</span>
        </a>
        <div id="collapseRekamMedis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('rekam-medis.index') }}">Daftar Rekam Medis</a>

          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayanan" aria-expanded="true"
          aria-controls="collapseLayanan">
          <i class="fas fa-network-wired"></i>
          <span>Daftar Layanan</span>
        </a>
        <div id="collapseLayanan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('kunjungan.index') }}">Data Kunjungan</a>
            <a class="collapse-item" href="{{ route('rawatinap.index') }}">Data Rawat Inap</a>

          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePasien" aria-expanded="true"
          aria-controls="collapsePasien">
          <i class="fas fa-fw fa-users"></i>
          <span>Daftar Pasien</span>
        </a>
        <div id="collapsePasien" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('pasien.index') }}">Data Pasien</a>

          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObat"
          aria-expanded="true" aria-controls="collapseObat">
          <i class="fas fa-tablets"></i>
          <span>Daftar Obat</span>
        </a>
        <div id="collapseObat" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('obat.index') }}">Data Obat</a>
          </div>
        </div>
      </li>
      @endif

      @if (Auth::user()->role == 'pasien')
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataProfile"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-user-injured"></i> <span>Data Profile</span>
        </a>
        <div id="dataProfile" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('pasien.profile') }}">Profile</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataLayanan"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-network-wired"></i> <span>Data Layanan</span>
        </a>
        <div id="dataLayanan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('pasien.kunjungan') }}">Pendaftaran Kunjungan</a>
            <a class="collapse-item" href="{{ route('pasien.riwayatKunjungan') }}">Riwayat Kunjungan</a>
            <a class="collapse-item" href="{{ route('pasien.riwayatRawatInap') }}">Riwayat Rawat Inap</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataRekamMedis"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-file-invoice"></i> <span>Data Rekam Medis</span>
        </a>
        <div id="dataRekamMedis" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('pasien.rekamMedis') }}">Rekam Medis</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kritikSaran"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-envelope"></i> <span>Kritik & Saran</span>
        </a>
        <div id="kritikSaran" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('pasien.kritikSaran') }}">Form Kritik & Saran</a>
          </div>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-users"></i> <span>Pasien</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('pasien.index') }}">Riwayat Berobat</a>
          </div>
        </div>
      </li> --}}
      @endif

      @if (Auth::user()->role == 'admin')
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i></fas>
          <span>Pengelolaan pengguna</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('admin.index') }}">Daftar User</a>
            <a class="collapse-item" href="{{ route('admin-dokter.index') }}">Daftar Dokter</a>
            <a class="collapse-item" href="{{ route('admin-pasien.index') }}">Daftar Pasien</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-network-wired"></i>
          <span>Pengelolaan Layanan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('kunjungan.index') }}">Daftar Kunjungan</a>
            <a class="collapse-item" href="{{ route('rawatinap.index') }}">Daftar Rawat Inap</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#adminRekamMedis"
          aria-expanded="true" aria-controls="adminRekamMedis">
          <i class="fas fa-folder-open"></i>
          <span>Daftar Rekam Medis</span>
        </a>
        <div id="adminRekamMedis" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action</h6>
            <a class="collapse-item" href="{{ route('rekam-medis.index') }}">Data Rekam Medis</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
          aria-controls="collapsePages">
          <i class="fas fa-tablets"></i>
          <span>Obat</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actions</h6>
            <a class="collapse-item" href="{{ route('obat.index') }}">Daftar Obat</a>

          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-bullhorn"></i>
          <span>Pengumuman</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actions</h6>
            <a class="collapse-item" href="{{ route('pengumuman.index') }}"> Data Pengumuman</a>

          </div>
        </div>
      </li>
      @endif

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle">
        </button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      @yield('content')
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Klinik Dr. Anita 2023</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('js/Chart.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/datatables-demo.js') }}"></script>

  <!-- select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <!-- end: include bootstrap4 and select2 -->

  <script>
    $(".multiselect-obat").select2({
      minimumResultsForSearch: Infinity,
      placeholder: "   Pilih Obat ",
      allowClear: true
    });
  </script>
  
</body>
</html>

