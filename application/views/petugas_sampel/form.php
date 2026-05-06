<div class="content-wrapper px-4 pt-4">
  <h3 class="text-dark fw-bold mb-4">
    <?= isset($petugas) ? 'Edit Data Petugas' : 'Tambah Data Petugas' ?>
  </h3>
  <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

  <div class="card shadow-sm w-50 mx-auto">
    <div class="card-body">
      <form action="<?= !empty($petugas->id_petugas) 
    ? site_url('petugas_sampel/edit_action/'.$petugas->id_petugas) 
    : site_url('petugas_sampel/create_action') ?>" method="post">
        <div class="mb-3">
          <label for="nama_petugas" class="form-label fw-semibold">Nama Petugas</label>
          <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" value="<?= $petugas->nama_petugas ?? '' ?>" required>
        </div>

        <div class="mb-3">
          <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
          <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $petugas->jabatan ?? '' ?>">
        </div>

        <div class="d-flex justify-content-between">
          <a href="<?= site_url('petugas_sampel') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
