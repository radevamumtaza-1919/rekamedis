<div class="content-wrapper px-4 pt-4">
  <h3 class="text-dark fw-bold mb-4">
    <?= isset($wilayah->id) && !empty($wilayah->id) ? 'Edit Data Puskesmas Wilayah' : 'Tambah Data Puskesmas Wilayah' ?>
  </h3>
  <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

  <div class="card shadow-sm w-50 mx-auto">
    <div class="card-body">
      <form action="<?= $action ?>" method="post">
        <input type="hidden" name="id" value="<?= $wilayah->id ?? '' ?>">
        
        <div class="mb-3">
          <label for="nama_puskesmas" class="form-label fw-semibold">Nama Puskesmas <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="nama_puskesmas" id="nama_puskesmas" value="<?= $wilayah->nama_puskesmas ?? '' ?>" required placeholder="Contoh: Puskesmas Melintang">
        </div>

        <div class="mb-3">
          <label for="kecamatan" class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?= $wilayah->kecamatan ?? '' ?>" required placeholder="Contoh: Rangkui">
        </div>

        <div class="mb-3">
          <label for="kelurahan_list" class="form-label fw-semibold">Daftar Kelurahan (Wilayah Kerja)</label>
          <textarea class="form-control" name="kelurahan_list" id="kelurahan_list" rows="3" placeholder="Pisahkan dengan koma. Contoh: Melintang, Pintu Air, Asam"><?= $wilayah->kelurahan_list ?? '' ?></textarea>
          <small class="text-muted">Gunakan pemisah koma (,) jika ada lebih dari satu kelurahan. Penulisan kelurahan harus sesuai dengan pilihan di form pendaftaran.</small>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="<?= site_url('puskesmas_wilayah') ?>" class="btn btn-secondary">
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


