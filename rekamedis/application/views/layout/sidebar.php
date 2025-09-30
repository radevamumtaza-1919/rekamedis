<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
  <div class="container-fluid">
    <!-- Role -->
<span class="fw-bold text-dark ms-1">Hallo Administrator</span>

    
    <!-- Nama Aplikasi -->
    <span class="navbar-brand mb-0 h5 fw-bold">Laboratorium Kesehatan Kota Pangkal Pinang</span>

    <!-- Logout Button -->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a href="<?= site_url('auth/logout') ?>" class="btn btn-primary rounded-pill px-3 py-1 d-flex align-items-center">
    <i class="fas fa-sign-out-alt me-2"></i> <span class="text-white">Sign Out</span>
      </a>
        </li>
          </ul>
            </div>
             </nav>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= site_url('dashboard') ?>" class="brand-link">
    <img src="<?= base_url('assets/img/logolabkes.png') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E-Rekam Medis</span>
  </a>

  <!-- Sidebar Content -->
  <div class="sidebar">
    <!-- Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

        <li class="nav-item">
          <a href="<?= site_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-hospital-user"></i>
            <p>Dashboard</p>
          </a>
        </li>


        <li class="nav-item has-treeview <?= in_array($this->uri->segment(1), ['dokter_pengirim','pasien','ambil_sampel','pembayaran','Pemeriksaan','form_permintaan','Kesmas']) ? 'menu-open' : '' ?>">
  <a href="#" class="nav-link <?= in_array($this->uri->segment(1), ['dokter_pengirim','pasien','ambil_sampel','pembayaran','Pemeriksaan','form_permintaan','Kesmas']) ? 'active' : '' ?>">
    <i class="nav-icon fas fa-clinic-medical"></i>
    <p>
      Klinik
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

        <li class="nav-item">
          <a href="<?= site_url('form_permintaan') ?>" class="nav-link <?= $this->uri->segment(1) == 'form_permintaan' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-clinic-medical text-success"></i>
            <p>Form Pendaftaran Klinik</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('dokter_pengirim') ?>" class="nav-link <?= $this->uri->segment(1) == 'dokter_pengirim' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-md text-success"></i>
            <p>Data Dokter Pengirim</p>
          </a>
        </li>

                <?php if($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'petugas'): ?>
        <li class="nav-item">
            <a href="<?= site_url('pasien') ?>" class="nav-link <?= $this->uri->segment(1) == 'pasien' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-users text-success"></i>
                <span>Data Pasien</span>
                </a>
            </li>

        

                <li class="nav-item">
          <a href="<?= site_url('ambil_sampel') ?>" class="nav-link <?= $this->uri->segment(1) == 'ambil_sampel' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-vial text-success"></i>
            <p>Data Ambil Sampel</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('pembayaran') ?>" class="nav-link <?= $this->uri->segment(1) == 'pembayaran' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-credit-card text-success"></i>
            <p>Pembayaran</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('rekam_medis') ?>" class="nav-link <?= $this->uri->segment(1) == 'rekam_medis' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-file-medical text-success"></i>
            <p>Rekam Medis</p>
          </a>
        </li>

         
        <li class="nav-item has-treeview <?= in_array($this->uri->segment(1), ['laporan_keuangan','laporan_pemeriksaan']) ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= in_array($this->uri->segment(1), ['laporan_keuangan','laporan_pemeriksaan']) ? 'active' : '' ?>">
        <i class="nav-icon fas fa-file-alt text-success"></i>
        <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url('laporan_keuangan') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan_keuangan' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Keuangan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('laporan_pemeriksaan') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan_pemeriksaan' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Pemeriksaan</p>
            </a>
        </li>
    </ul>
</li>

</ul>
</li>


<li class="nav-item has-treeview <?= in_array($this->uri->segment(1), []) ? 'menu-open' : '' ?>">
  <a href="#" class="nav-link <?= in_array($this->uri->segment(1), []) ? 'active' : '' ?>">
    <i class="nav-icon fas fa-clinic-medical"></i>
    <p>
      Kesmas
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">

  <li class="nav-item">
          <a href="<?= site_url('Form_Kesmas') ?>" class="nav-link <?= $this->uri->segment(1) == 'Form_Kesmasl' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-plus text-primary"></i>
            <p>Pendaftaran Kesmas</p>
          </a>
        </li>
  
  <li class="nav-item">
          <a href="<?= site_url('Identitas_sampel') ?>" class="nav-link <?= $this->uri->segment(1) == 'Identitas_sampel' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-vials text-primary"></i>
            <p>Identitas Sampel</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('Jenis_sampel') ?>" class="nav-link <?= $this->uri->segment(1) == 'Jenis_sampel' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-file-medical text-primary"></i>
            <p>Identitas Pengirim</p>
          </a>
        </li>
                </ul>
                </li>

<li class="nav-item">
          <a href="<?= site_url('user') ?>" class="nav-link <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
            <i class="fas fa-cog nav-icon" style="color: red;"></i>
            <p>Manajemen User</p>
          </a>
        </li>
        <?php endif; ?> 
      </ul>
    </nav>
  </div>
</aside>
