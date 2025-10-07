<div class="content-wrapper px-4 pt-4">
  <h4 class="mb-4 text-primary fw-bold">Formulir Permintaan Pemeriksaan Laboratorium Kesmas</h4>

  <!-- Identitas Sampel -->
  <div class="card mb-4">
    <div class="card-header bg-info text-white">Identitas Sampel</div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <label>No. Registrasi Sampel</label>
          <input type="text" name="no_sampel" class="form-control" readonly value="<?= $no_register ?>">
        </div>
        <div class="col-md-4">
          <label>Nama Sampel</label>
          <input type="text" name="nama_sampel" class="form-control">
        </div>
        <div class="col-md-4">
          <label>Jenis Sampel</label>
          <input type="text" name="jenis_sampel" class="form-control">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-3">
          <label>Volume (ml)</label>
          <input type="text" name="volume" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Tanggal Pengambilan</label>
          <input type="date" name="tgl_pengambilan" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Jam Pengambilan</label>
          <input type="time" name="jam_pengambilan" class="form-control">
        </div>
        <div class="col-md-3">
          <label>Petugas Pengambil</label>
          <input type="text" name="petugas_pengambil" class="form-control">
        </div>
      </div>
    </div>
  </div>

  <!-- Identitas Pengirim -->
  <div class="card mb-4">
    <div class="card-header bg-info text-white">Identitas Pengirim</div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <label>Nama</label>
          <input type="text" name="nama_pengirim" class="form-control">
        </div>
        <div class="col-md-4">
          <label>Alamat</label>
          <input type="text" name="alamat_pengirim" class="form-control">
        </div>
        <div class="col-md-4">
          <label>Instansi</label>
          <input type="text" name="instansi" class="form-control">
        </div>
        <div class="col-md-4 mt-3">
          <label>Tanggal Permintaan</label>
          <input type="date" name="tgl_permintaan" class="form-control">
        </div>
      </div>
    </div>
  </div>

  <!-- Daftar Jenis Pemeriksaan -->
  <div class="card mb-4">
    <div class="card-header bg-success text-white">Daftar Jenis Pemeriksaan</div>
    <div class="card-body">
      <p class="fw-bold">I. AIR MINUM</p>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th width="30%">Pemeriksaan</th>
            <th width="20%">Hasil (angka)</th>
            <th width="50%">Keterangan / Paraf</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Jumlah Zat Padat Terlarut</td>
            <td><input type="text" name="airminum_zat_terlarut" class="form-control"></td>
            <td><input type="text" name="airminum_zat_terlarut_ket" class="form-control"></td>
          </tr>
          <tr>
            <td>Warna</td>
            <td><input type="text" name="airminum_warna" class="form-control"></td>
            <td><input type="text" name="airminum_warna_ket" class="form-control"></td>
          </tr>
          <!-- Tambah baris lain sesuai kebutuhan -->
        </tbody>
      </table>

      <p class="fw-bold mt-4">II. AIR BERSIH</p>
      <!-- Gunakan struktur table sama seperti di atas -->

      <p class="fw-bold mt-4">III. MAKANAN</p>
      <!-- Tambah sesuai daftar item -->

      <p class="fw-bold mt-4">IV. LINGKUNGAN</p>
      <!-- Tambah sesuai daftar item -->
    </div>
  </div>

  <!-- Informasi Tambahan -->
  <div class="card mb-4">
    <div class="card-header bg-info text-white">Informasi Tambahan</div>
    <div class="card-body">
      <textarea name="informasi_tambahan" class="form-control" rows="3"></textarea>
    </div>
  </div>

  <!-- Tombol Submit -->
  <div class="text-end">
    <button type="submit" class="btn btn-primary px-4">Simpan</button>
  </div>
</div>
