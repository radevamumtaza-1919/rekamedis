<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light position-relative" style="background: linear-gradient(to right, #72dfbe, #5bc4cb); border-bottom: none;">
  <div class="container-fluid">
    <!-- Role -->
    <ul class="navbar-nav d-flex align-items-center" style="z-index: 1;">
      <li class="nav-item">
        <a class="nav-link text-dark" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>

      <li class="nav-item">
        <span class="fw-bold text-dark ms-1">
          Hallo <?= ucfirst($this->session->userdata('role')) ?>
        </span>
      </li>
    </ul>

    <!-- Nama Aplikasi (Center) -->
    <div class="position-absolute w-100 d-flex justify-content-center" style="left: 0; pointer-events: none;">
      <span class="mb-0 h5 fw-bold text-white d-none d-md-block" style="letter-spacing: 0.5px;">Laboratorium Kesehatan Kota Pangkal Pinang</span>
    </div>

    <!-- Logout -->
    <ul class="navbar-nav ms-auto d-flex align-items-center" style="z-index: 1;">
      <li class="nav-item">
        <a href="<?= site_url('auth/logout') ?>" class="btn rounded-pill px-3 py-1 d-flex align-items-center shadow-sm" style="background-color: #bce9dc; color: #1c3c34; border: none; font-weight: 600; font-size: 0.9rem;">
          <i class="fas fa-sign-out-alt me-2"></i> <span>Sign Out</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

<!-- Sidebar -->
<style>
  .sidebar-light-info .nav-sidebar .nav-item > .nav-link.active {
      background-color: #d1f2eb !important;
      color: #0d3b30 !important;
      border-radius: 10px;
  }
  .sidebar-light-info .nav-sidebar .nav-item > .nav-link {
      border-radius: 10px;
      margin: 0 0.5rem;
  }
  .sidebar-light-info .nav-sidebar .nav-item > .nav-link:hover {
      background-color: #e8f8f5;
  }
  .sidebar-light-info .nav-header {
      color: #343a40 !important;
      font-weight: 800; 
      font-size: 0.85rem;
  }
</style>
<aside class="main-sidebar sidebar-light-info elevation-4">
  <!-- Brand Logo -->
  <a href="<?= site_url('dashboard') ?>" class="brand-link">
    <img src="<?= base_url('assets/img/logolabkes.png') ?>" alt="Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="mb-0 h5 fw-bold d-none d-md-block">UPTD Labkes</span>
  </a>

  <!-- Sidebar Content -->
  <div class="sidebar">
    <!-- Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false">

        <!-- Sidebar Search Form -->
        <div class="form-inline px-3 pb-2">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar bg-light text-dark border-dark" type="search"
              placeholder="Cari menu..." aria-label="Search" onkeyup="searchSidebar(this.value)">
            <div class="input-group-append">
              <button class="btn btn-sidebar bg-secondary">
                <i class="fas fa-search text-white"></i>
              </button>
            </div>
          </div>
        </div>

        <?php
        $user_role = strtolower((string) $this->session->userdata('role'));
        $is_admin = ($user_role === 'admin');
        $is_pemeriksa = ($user_role === 'pemeriksa sampel');
        $is_pendaftaran = ($user_role === 'petugas pendaftaran');
        $is_rm = ($user_role === 'petugas rekam medis' || $user_role === 'petugas rm');
        ?>

        <!-- Sidebar Title: Menu Utama -->
        <li class="nav-header text-uppercase">Menu Utama</li>

        <li class="nav-item">
          <a href="<?= site_url('dashboard') ?>"
            class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-hospital-user"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <?php if ($is_admin || $is_pendaftaran || $is_pemeriksa): ?>
          <li class="nav-header text-uppercase">MENU KLINIK DAN REKAM MEDIS</li>
          <li
            class="nav-item has-treeview <?= in_array($this->uri->segment(1), ['dokter_pengirim', 'pasien', 'ambil_sampel', 'pembayaran', 'Pemeriksaan', 'form_permintaan_klinik', 'Kesmas', 'uji_klinik', 'laporan_uji_klinik', 'petugas_hasil']) ? 'menu-open' : '' ?>">
            <a href="#"
              class="nav-link <?= in_array($this->uri->segment(1), ['dokter_pengirim', 'pasien', 'ambil_sampel', 'pembayaran', 'Pemeriksaan', 'form_permintaan_klinik', 'Kesmas', 'uji_klinik', 'laporan_uji_klinik', 'petugas_hasil']) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>
                Klinik
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


              <?php if ($is_admin || $is_pendaftaran): ?>

                <li class="nav-item">
                  <a href="<?= site_url('form_permintaan_klinik') ?>"
                    class="nav-link <?= $this->uri->segment(1) == 'form_permintaan_klinik' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-medical text-success"></i>
                    <p>Form Pendaftaran Klinik</p>
                  </a>
                </li>
              <?php endif; ?>


              <?php if ($is_admin || $is_pemeriksa): ?>

                <li class="nav-item">
                  <a href="<?= site_url('uji_klinik') ?>"
                    class="nav-link <?= $this->uri->segment(1) == 'uji_klinik' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-user-md text-success"></i>
                    <p>Uji Lab Klinik</p>
                  </a>
                </li>
              <?php endif; ?>

              <?php if ($is_admin || $is_pendaftaran): ?>
                <li
                  class="nav-item has-treeview <?= in_array($this->uri->segment(1), ['laporan_uji_klinik', 'laporan_pemeriksaan']) ? 'menu-open' : '' ?>">
                  <a href="#"
                    class="nav-link <?= in_array($this->uri->segment(1), ['laporan_pemeriksaan']) ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-alt text-success"></i>
                    <p>
                      Laporan
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= site_url('laporan_uji_klinik') ?>"
                        class="nav-link <?= $this->uri->segment(1) == 'laporan_uji_klinik' ? 'active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Laporan Uji Lab Klinik</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if ($is_admin || $is_pendaftaran || $is_rm): ?>
          <li class="nav-header text-uppercase">Menu Rekam Medis</li>
          <li
            class="nav-item has-treeview <?= in_array($this->uri->segment(1), ['form_permintaan_rm', 'uji_rekam_medis', 'hasil_laporan']) ? 'menu-open' : '' ?>">
            <a href="#"
              class="nav-link <?= in_array($this->uri->segment(1), ['form_permintaan_rm', 'uji_rekam_medis', 'hasil_laporan']) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>
                Rekam Medis
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php if ($is_admin || $is_pendaftaran || $is_rm): ?>

                <li class="nav-item">
                  <a href="<?= site_url('form_permintaan_rm') ?>"
                    class="nav-link <?= $this->uri->segment(1) == 'form_permintaan_rm' && (empty($this->uri->segment(2)) || $this->uri->segment(2) == 'index') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-file-medical text-success"></i>
                    <p>Pendaftaran Pasien Rekam Medis</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= site_url('uji_rekam_medis') ?>"
                    class="nav-link <?= ($this->uri->segment(1) == 'uji_rekam_medis' && !in_array($this->uri->segment(2), ['index', 'lihat_laporan_soap'])) ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-user-md text-success"></i>
                    <p>Detail Kunjungan Pasien</p>
                  </a>
                </li>

                <?php if ($is_admin || $is_rm): ?>
                  <li class="nav-item">
                    <a href="<?= site_url('hasil_laporan') ?>" class="nav-link <?= $this->uri->segment(2) == 'hasil_laporan' ? 'active' : '' ?>">
                      <i class="nav-icon fas fa-flask text-info"></i>
                      <p>Laporan Hasil Uji klinik dan SOAP</p>
                    </a>
                  </li>
                <?php endif; ?>

              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if ($is_admin): ?>
          <li class="nav-header text-uppercase">Menu Data Pasien</li>
          <li
            class="nav-item has-treeview <?= in_array($this->uri->segment(1), ['laporan_rekam_medis']) ? 'menu-open' : '' ?>">
            <a href="#"
              class="nav-link <?= in_array($this->uri->segment(1), ['laporan_rekam_medis']) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>
                Menu Laporan Data Pasien
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="<?= site_url('laporan_rekam_medis') ?>"
                  class="nav-link <?= ($this->uri->segment(1) == 'laporan_rekam_medis' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Data Pasien</p>
                </a>
              </li>
            </ul>
            
          </li>
        <?php endif; ?>

        <?php if ($is_admin): ?>
          <li class="nav-header text-uppercase">Menu Manajemen User</li>
          <li class="nav-item">
            <a href="<?= site_url('user') ?>" class="nav-link <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
              <i class="fas fa-cog nav-icon" style="color: red;"></i>
              <p>Manajemen Akun User</p>
            </a>
          </li>

          <li class="nav-header text-uppercase">Menu Manajemen Petugas</li>
          <li
            class="nav-item has-treeview <?= in_array($this->uri->segment(1), ['petugas_sampel', 'penanggung_teknis', 'petugas_hasil', 'verifikator', 'petugas_verifikasi', 'petugas_validasi', 'petugas_dokter']) ? 'menu-open' : '' ?>">
            <a href="#"
              class="nav-link <?= in_array($this->uri->segment(1), ['petugas_sampel', 'penanggung_teknis', 'petugas_hasil', 'verifikator', 'petugas_verifikasi', 'petugas_validasi', 'petugas_dokter']) ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users-cog text-primary"></i>
              <p>
                Manajemen Petugas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('petugas_sampel') ?>"
                  class="nav-link <?= $this->uri->segment(1) == 'petugas_sampel' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Petugas Klinik</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= site_url('petugas_verifikasi') ?>"
                  class="nav-link <?= $this->uri->segment(1) == 'petugas_verifikasi' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Verifikasi Pendaftaran</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= site_url('petugas_validasi') ?>"
                  class="nav-link <?= $this->uri->segment(1) == 'petugas_validasi' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Validasi Pendaftaran</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= site_url('verifikator') ?>"
                  class="nav-link <?= $this->uri->segment(1) == 'verifikator' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon text-blue-600"></i>
                  <p>Verifikator Hasil</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= site_url('penanggung_teknis') ?>"
                  class="nav-link <?= $this->uri->segment(1) == 'penanggung_teknis' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon text-blue-600"></i>
                  <p>Penanggung Jawab</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= site_url('petugas_dokter') ?>"
                  class="nav-link <?= $this->uri->segment(1) == 'petugas_dokter' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon text-blue-600"></i>
                  <p>Dokter Pemeriksa Rekam Medis</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>

      </ul>
    </nav>
  </div>
</aside>

<!--search sidebar-->
<script>
  function searchSidebar(keyword) {
    const navItems = document.querySelectorAll('.nav-sidebar .nav-item');
    keyword = keyword.toLowerCase();

    navItems.forEach(item => {
      const link = item.querySelector('a');
      if (link) {
        const text = link.innerText.toLowerCase();
        if (text.includes(keyword)) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      }
    });
  }
</script>