<div class="content-wrapper px-4 pt-4">
  <h4 class="text-primary fw-bold mb-4">Data Formulir Permintaan Pemeriksaan Kesmas</h4>

  <!-- Flash message -->
  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
      <?= $this->session->flashdata('success') ?>
    </div>
  <?php endif; ?>

  <!-- Tombol tambah -->
  <a href="<?= site_url('form_permintaan_kesmas/create') ?>" class="btn btn-success mb-3 rounded-pill shadow-sm px-4 py-2 d-inline-flex align-items-center">
    <i class="fas fa-plus me-2"></i> Tambah Data
  </a>

  <!-- Tabel data -->
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead class="table-light text-center">
            <tr>
              <th>No</th>
              <th>No. Registrasi</th>
              <th>Nama Sampel</th>
              <th>Jenis Sampel</th>
              <th>Tanggal Permintaan</th>
              <th>Petugas Pengambil</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($formulir)): ?>
              <tr>
                <td colspan="7" class="text-center text-muted">Belum ada data.</td>
              </tr>
            <?php else: ?>
              <?php $no = 1; foreach ($formulir as $row): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->no_register ?></td>
                  <td><?= $row->nama_sampel ?? '-' ?></td>
                  <td><?= $row->jenis_sampel ?? '-' ?></td>
                  <td><?= date('d-m-Y', strtotime($row->tgl_permintaan)) ?></td>
                  <td><?= $row->petugas_pengambil ?? '-' ?></td>
                  <td class="text-center">
                    <a href="<?= site_url('form_permintaan_kesmas/detail/' . $row->id) ?>" class="btn btn-sm btn-info">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= site_url('form_permintaan_kesmas/delete/' . $row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
