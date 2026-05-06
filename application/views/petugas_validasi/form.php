<div class="content-wrapper px-4 pt-4">
  <h3 class="text-dark fw-bold mb-4">
    <?= isset($petugas) ? 'Edit Petugas Validasi' : 'Tambah Petugas Validasi' ?>
  </h3>
  <hr>

  <div class="card shadow-sm w-50 mx-auto">
    <div class="card-body">
      <form action="<?= isset($petugas)
          ? site_url('petugas_validasi/edit_action/'.$petugas->id_validasi)
          : site_url('petugas_validasi/create_action') ?>"
        method="post">

        <div class="mb-3">
          <label class="fw-semibold">Nama Petugas</label>
          <input type="text" name="nama_petugas" class="form-control"
                 value="<?= $petugas->nama_petugas ?? '' ?>" required>
        </div>

        <div class="mb-3">
          <label class="fw-semibold">Jabatan</label>
          <input type="text" name="jabatan" class="form-control"
                 value="<?= $petugas->jabatan ?? '' ?>">
        </div>

        <div class="d-flex justify-content-between">
          <a href="<?= site_url('petugas_validasi') ?>" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
