<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
  <div class="container-fluid">
    <!-- Logo Lab -->
    <span class="fw-bold text-dark ms-1">Hallo Petugas</span>
    
    <!-- Nama Aplikasi -->
    <span class="navbar-brand mb-0 h5 fw-bold">Laboratorium Kesehatan Kota Pangkal Pinang</span>

    <!-- Logout Button -->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a href="<?= site_url('auth/logout') ?>" class="nav-link text-white">
          <i class="fas fa-sign-out-alt me-1"></i> Logout
        </a>
      </li>
    </ul>
  </div>
</nav>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= site_url('dashboard_petugas') ?>" class="brand-link">
    <img src="<?= base_url('assets/img/logolabkes.png') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E-Rekam Medis</span>
  </a>

  <!-- Sidebar Content -->
  <div class="sidebar">
    <!-- Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

        <li class="nav-item">
          <a href="<?= site_url('dashboard_petugas') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard_petugas' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <?php if($this->session->userdata('role') == 'petugas' || $this->session->userdata('role') == 'petugas'): ?>
        <li class="nav-item">
            <a href="<?= site_url('pasien') ?>" class="nav-link <?= $this->uri->segment(1) == 'pasien' ? 'active' : '' ?>">
                <i class="fas fa-users"></i>
                <span>Data Pasien</span>
            </a>
        </li>
        <?php endif; ?>

      </ul>
    </nav>
  </div>
</aside>
