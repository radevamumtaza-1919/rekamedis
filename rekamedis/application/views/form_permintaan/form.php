<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Formulir Permintaan Pemeriksaan</h3>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('form_permintaan/store') ?>" method="post" class="card card-body shadow-sm">

        <h5 class="text-primary">Identitas Pasien</h5>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label>No. Register</label>
                <input type="text" name="no_register" class="form-control" value="<?= $no_register ?>" readonly required>
            </div>
            <div class="mb-3 col-md-6">
                <label>Nama Pasien <span class="text-danger">*</span></label>
                <input type="text" name="nama_pasien" class="form-control" required>
            </div>
            <div class="mb-3 col-md-6">
                <label>NIK <span class="text-danger">*</span></label>
                <input type="text" name="nik" class="form-control" required>
            </div>
            <div class="mb-3 col-md-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">

            </div>
            <div class="mb-3 col-md-3">
                <label>Umur</label>
                <input type="text" name="umur" id="umur" class="form-control" placeholder="Contoh: 34 thn" readonly>

            </div>
            <div class="mb-3 col-md-6">
                <label>Jenis Kelamin<span class="text-danger">*</span></label>
                <select name="gender" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            
            <div class="mb-3 col-md-6">
                <label>No. Telp</label>
                <input type="text" name="no_telp_pasien" class="form-control">
            </div>
            <div class="mb-3 col-12">
                <label>Alamat</label>
                <input type="text" name="alamat_pasien" class="form-control">
            </div>
        </div>

        <h5 class="text-primary mt-4">Identitas Pengirim</h5>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label>Nama Dokter</label>
                <input type="text" name="nama_dokter" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
                <label>No. Telp Dokter</label>
                <input type="text" name="telp_pengirim" class="form-control">
            </div>
            <div class="mb-3 col-12">
                <label>Alamat Dokter</label>
                <input type="text" name="alamat_pengirim" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label>Tanggal Form</label>
                <input type="date" name="tgl_form" class="form-control" required>
            </div>
        </div>

        <h5 class="text-primary mt-4">Diagnosa Klinis</h5>
        <div class="mb-3">
            <label>Diagnosa/Keterangan Klinik</label>
            <textarea name="diagnosa_klinis" class="form-control" rows="2"></textarea>
        </div>
        <div class="mb-3">
            <label>Obat yang Dikonsumsi</label>
            <textarea name="obat_dikonsumsi" class="form-control" rows="2"></textarea>
        </div>

        <h5 class="text-primary mt-4">Data Spesimen</h5>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label>Asal Sampel</label><br>
                <?php foreach(['Langsung', 'Kiriman', 'Rujuk'] as $val): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="asal_sampel[]" value="<?= $val ?>">
                        <label class="form-check-label"><?= $val ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mb-3 col-md-6">
                <label>Status Puasa</label><br>
                <?php foreach(['Puasa', 'Tidak Puasa'] as $val): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="puasa" value="<?= $val ?>">
                        <label class="form-check-label"><?= $val ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mb-3">
            <label>Lokasi Pengambilan</label><br>
            <?php foreach(['Tangan','Paha','Rectal','Nasofaring','Lain-lain'] as $val): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="lokasi_pengambilan[]" value="<?= $val ?>">
                    <label class="form-check-label"><?= $val ?></label>
                </div>
            <?php endforeach; ?>
            <input type="text" name="lokasi_lainnya" class="form-control mt-2" placeholder="Tuliskan jika lainnya">
        </div>

        <div class="mb-3">
            <label>Jenis Spesimen</label><br>
            <?php foreach(['Darah','Urine','Swab','Faeces','Jaringan','Sputum','Cairan','Lain-lain'] as $val): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jenis_spesimen[]" value="<?= $val ?>">
                    <label class="form-check-label"><?= $val ?></label>
                </div>
            <?php endforeach; ?>
            <input type="text" name="spesimen_lainnya" class="form-control mt-2" placeholder="Tuliskan jika lainnya">
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label>Tanggal Permintaan</label>
                <input type="date" name="tgl_permintaan" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label>Tanggal Pengambilan</label>
                <input type="date" name="tgl_pengambilan" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label>Jam Pengambilan</label>
                <input type="time" name="jam_pengambilan" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label>Volume Spesimen</label>
                <input type="text" name="volume_spesimen" class="form-control" placeholder="Contoh: 3 ml">
            </div>
            <div class="mb-3 col-md-6">
                <label>Prioritas</label><br>
                <?php foreach(['Biasa', 'Cito'] as $val): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="prioritas" value="<?= $val ?>" <?= $val=='Biasa'?'checked':'' ?>>
                        <label class="form-check-label"><?= $val ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mb-3">
            <label>Informasi Tambahan</label>
            <textarea name="info_tambahan" class="form-control" rows="2"></textarea>
        </div>

                    

<h5 class="text-primary mt-4 text-center">Daftar Jenis Pemeriksaan</h5>
<div class="row justify-content-center">
  <!-- Tabel Hematologi -->
  <div class="col-md-6">
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
          <th class="text-center" style="width:30px;"></th>
          <th colspan="3" class="text-center bg-light">
            <h6 class="mb-0">Hematologi</h6>
          </th>
        </tr>
        <tr>
          <th></th>
          <th>Pemeriksaan</th>
          <th style="width:50px;">Hasil</th>
          <th style="width:50px;">Paraf</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="pilih_hematologi"></td>
          <td>Hemoglobin</td>
          <td><input type="text" name="hemoglobin" class="form-control form-control-sm" style="width:50px;"></td>
          <td><input type="text" name="hemoglobin_paraf" class="form-control form-control-sm" style="width:50px;"></td>
        </tr>

        <tr>
          <td class="text-center"><input type="checkbox" name="pilih_pkt_rutin"></td>
          <td><strong>Paket Hematologi Rutin</strong></td>
          <td colspan="2"></td>
        </tr>
        <tr><td></td><td>Hb</td><td><input type="text" name="hasil_hb" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_hb" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Leukosit</td><td><input type="text" name="hasil_leukosit" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_leukosit" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Eritrosit</td><td><input type="text" name="hasil_eritrosit" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_eritrosit" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Ht</td><td><input type="text" name="hasil_ht" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_ht" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Trombosit</td><td><input type="text" name="hasil_trombosit" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_trombosit" class="form-control form-control-sm" style="width:50px;"></td></tr>

        <tr>
          <td class="text-center"><input type="checkbox" name="pilih_pkt_lengkap"></td>
          <td><strong>Paket Hematologi Lengkap</strong></td>
          <td colspan="2"></td>
        </tr>
        <tr><td></td><td>HB</td><td><input type="text" name="hasil_mcv" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_mcv" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Leukosit</td><td><input type="text" name="hasil_mch" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_mch" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Eritrosit</td><td><input type="text" name="hasil_mchc" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_mchc" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Ht</td><td><input type="text" name="hasil_ht" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_ht" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Trombosit</td><td><input type="text" name="hasil_trombosit" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_trombosit" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>MCV</td><td><input type="text" name="hasil_ht" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_ht" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>MCH</td><td><input type="text" name="hasil_trombosit" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_trombosit" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>MCHC</td><td><input type="text" name="hasil_ht" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_ht" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="hitung_jenis"></td>
          <td><strong>Hitung Jenis</strong></td>
          <td colspan="2"></td>
        </tr>
        <tr><td></td><td>Basofil</td><td><input type="text" name="hasil_basofil" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_basofil" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Eosinofil</td><td><input type="text" name="hasil_eosinofil" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_eosinofil" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Netrofil</td><td><input type="text" name="hasil_netrofil" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_netrofil" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Limfosit</td><td><input type="text" name="hasil_limfosit" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_limfosit" class="form-control form-control-sm" style="width:50px;"></td></tr>
        <tr><td></td><td>Monosit</td><td><input type="text" name="hasil_monosit" class="form-control form-control-sm" style="width:50px;"></td><td><input type="text" name="paraf_monosit" class="form-control form-control-sm" style="width:50px;"></td></tr>

        <tr>
          <td class="text-center"><input type="checkbox" name="pilih_led"></td>
          <td>LED</td>
          <td><input type="text" name="hasil_led" class="form-control form-control-sm" style="width:50px;"></td>
          <td><input type="text" name="paraf_led" class="form-control form-control-sm" style="width:50px;"></td>
        </tr>

        <tr>
          <td class="text-center"><input type="checkbox" name="pilih_goldar"></td>
          <td>Golongan Darah (Slide)</td>
          <td><input type="text" name="hasil_goldar" class="form-control form-control-sm" style="width:50px;"></td>
          <td><input type="text" name="paraf_goldar" class="form-control form-control-sm" style="width:50px;"></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Kimia Darah tidak berubah -->
  <!-- Tabel Kimia Darah -->
<div class="col-md-6">
  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th class="text-center" style="width:30px;"></th>
        <th colspan="3" class="text-center bg-light">
          <h6 class="mb-0">Kimia Darah</h6>
        </th>
      </tr>
      <tr>
        <th></th>
        <th>Pemeriksaan</th>
        <th style="width:50px;">Hasil</th>
        <th style="width:50px;">Paraf</th>
      </tr>
    </thead>
    <tbody>
     <tr>
        <tr>
  <td></td>
  <td><strong>Faal Hati</strong></td>
  <td colspan="2"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgot"></td>
  <td>SGOT</td>
  <td><input type="text" name="hasil_sgot" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgot" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgpt"></td>
  <td>SGPT</td>
  <td><input type="text" name="hasil_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Protein Total</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_albumin"></td>
  <td>Albumin</td>
  <td><input type="text" name="hasil_albumin" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_albumin" class="form-control form-control-sm" style="width:50px;"></td>
</tr>

      <tr>
  <td></td>
  <td><strong>Fungsi Ginjal</strong></td>
  <td colspan="2"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgot"></td>
  <td>Ureum</td>
  <td><input type="text" name="hasil_sgot" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgot" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgpt"></td>
  <td>Creatinin</td>
  <td><input type="text" name="hasil_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Unic Acid</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
  <tr>
      <tr>
  <td></td>
  <td><strong>Gula Darah</strong></td>
  <td colspan="2"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgot"></td>
  <td>Glukosa Puasa</td>
  <td><input type="text" name="hasil_sgot" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgot" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgpt"></td>
  <td>Glukosa 2 jam PP</td>
  <td><input type="text" name="hasil_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Glukosa Sewaktu</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Hba1c</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
  <tr>
      <tr>
  <td></td>
  <td><strong>Lemak</strong></td>
  <td colspan="2"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgot"></td>
  <td>Paket Profil Lipid</td>
  <td><input type="text" name="hasil_sgot" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgot" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgpt"></td>
  <td>Cholesterol Total</td>
  <td><input type="text" name="hasil_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Triglyserida</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>HDL Cholesterol</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>LDL Cholesterol</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
  <tr>
    </tbody>
    <!-- Masih dalam col-md-6, setelah tabel Kimia Darah -->
<table class="table table-bordered table-sm mt-4">
  <thead>
    <tr>
      <th class="text-center" style="width:30px;"></th>
      <th colspan="3" class="text-center bg-light">
        <h6 class="mb-0">Urinalisa</h6>
      </th>
    </tr>
    <tr>
      <th></th>
      <th>Pemeriksaan</th>
      <th style="width:50px;">Hasil</th>
      <th style="width:50px;">Paraf</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="text-center"><input type="checkbox" name="pilih_ph"></td>
      <td>Urin Lengkap</td>
      <td><input type="text" name="hasil_ph" class="form-control form-control-sm" style="width:50px;"></td>
      <td><input type="text" name="paraf_ph" class="form-control form-control-sm" style="width:50px;"></td>
    </tr>
    <tr>
  <td></td>
  <td><strong>Makroskopis</strong></td>
  <td colspan="2"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgot"></td>
  <td>Warna</td>
  <td><input type="text" name="hasil_sgot" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgot" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgpt"></td>
  <td>Kekeruhan</td>
  <td><input type="text" name="hasil_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Berat Jenis</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>pH</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Darah</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Glukosa</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Leukosit</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Protein</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Keton</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Nirit</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Bilirubin</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Urobilinogen</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Asam Askorbat</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td></td>
  <td><strong>Mikroskopis</strong></td>
  <td colspan="2"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgot"></td>
  <td>Leukosit</td>
  <td><input type="text" name="hasil_sgot" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgot" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_sgpt"></td>
  <td>Eritrosit</td>
  <td><input type="text" name="hasil_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_sgpt" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Kristal</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Silinder</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Bakteri</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>
<tr>
  <td class="text-center"><input type="checkbox" name="pilih_protein_total"></td>
  <td>Parasit</td>
  <td><input type="text" name="hasil_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
  <td><input type="text" name="paraf_protein_total" class="form-control form-control-sm" style="width:50px;"></td>
</tr>

    <tr>
      <td class="text-center"><input type="checkbox" name="pilih_glukosa_urine"></td>
      <td>Glukosa</td>
      <td><input type="text" name="hasil_glukosa_urine" class="form-control form-control-sm" style="width:50px;"></td>
      <td><input type="text" name="paraf_glukosa_urine" class="form-control form-control-sm" style="width:50px;"></td>
    </tr>
    <tr>
      <td class="text-center"><input type="checkbox" name="pilih_lekosit_urine"></td>
      <td>Lekosit</td>
      <td><input type="text" name="hasil_lekosit_urine" class="form-control form-control-sm" style="width:50px;"></td>
      <td><input type="text" name="paraf_lekosit_urine" class="form-control form-control-sm" style="width:50px;"></td>
    </tr>
    <tr>
      <td class="text-center"><input type="checkbox" name="pilih_eritrosit_urine"></td>
      <td>Eritrosit</td>
      <td><input type="text" name="hasil_eritrosit_urine" class="form-control form-control-sm" style="width:50px;"></td>
      <td><input type="text" name="paraf_eritrosit_urine" class="form-control form-control-sm" style="width:50px;"></td>
    </tr>
  </tbody>
</table>
</div> <!-- Tutup col-md-6 (Kimia Darah + Urinalisa) -->
 <!-- Tutup row -->
  </table>
</div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('form_permintaan') ?>" class="btn btn-secondary">Kembali</a>
            </form>
            <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tglLahirInput = document.getElementById("tgl_lahir");
            const umurInput = document.getElementById("umur");

            tglLahirInput.addEventListener("change", function() {
                const tglLahir = new Date(this.value);
                const today = new Date();

                if (!isNaN(tglLahir)) {
                    let umur = today.getFullYear() - tglLahir.getFullYear();
                    const bulan = today.getMonth() - tglLahir.getMonth();

                    if (bulan < 0 || (bulan === 0 && today.getDate() < tglLahir.getDate())) {
                        umur--;
                    }

                    umurInput.value = umur + " thn";
                } else {
                    umurInput.value = "";
                }
            });
        });
        </script>
</div>
        </div>