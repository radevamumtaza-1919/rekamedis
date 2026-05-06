<div class="content-wrapper px-4 pt-4">
  <h4 class="text-primary fw-bold mb-4"><?= $title ?></h4>

  <form action="<?= isset($dokter_pengirim) ? site_url('dokter_pengirim/update/' . $dokter_pengirim->id_dokter_pengirim) : site_url('dokter_pengirim/create') ?>" method="post">

    <div class="mb-3">
      <label for="nama" class="form-label">Nama Instansi / Dokter</label>
      <input type="text" name="nama" class="form-control" value="<?= isset($dokter_pengirim) ? $dokter_pengirim->nama : '' ?>" required>
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea name="alamat" class="form-control" required><?= isset($dokter_pengirim) ? $dokter_pengirim->alamat : '' ?></textarea>
    </div>

    <div class="mb-3">
      <label for="no_telp" class="form-label">No. Telp</label>
      <input type="text" name="no_telp" class="form-control" value="<?= isset($dokter_pengirim) ? $dokter_pengirim->no_telp : '' ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('dokter_pengirim') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>
