<div class="content-wrapper px-4 pt-4">
    <h3 class="text-center fw-bold mb-4">FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM KLINIK</h3>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('form_permintaan_klinik/store') ?>" method="post" class="card card-body shadow-sm">

        <!-- Baris atas dengan 3 card sejajar -->
<div class="row mb-4">

    <!-- Card Identitas Pasien -->
    <div class="col-md-4 d-flex">
        <div class="card border border-dark shadow-lg w-100 h-100 bg-white">
            <div class="card-header bg-secondary text-white fw-bold mb-0" style="font-weight: 800">
                Identitas Pasien
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label>No. Register</label>
                    <input type="text" name="no_register" class="form-control" value="<?= $no_register ?>" readonly required>
                </div>
                <div class="mb-2">
                    <label>Nama Pasien <span class="text-danger">*</span></label>
                    <input type="text" name="nama_pasien" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="gender" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Umur</label>
                    <input type="text" name="umur" id="umur" class="form-control" placeholder="Contoh: 34 thn" readonly>
                </div>
                <div class="mb-2">
                    <label>No. Telp</label>
                    <input type="text" name="no_telp_pasien" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Alamat</label>
                    <input type="text" name="alamat_pasien" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <!-- Card Identitas Pengirim -->
    <div class="col-md-4 d-flex">
        <div class="card border border-dark shadow-lg w-100 h-100 bg-white">
            <div class="card-header bg-secondary text-white fw-bold mb-0" style="font-weight: 800">
                Identitas Pengirim
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label>Nama Dokter</label>
                    <input type="text" name="nama_dokter" class="form-control">
                </div>
                <div class="mb-2">
                    <label>No. Telp Dokter</label>
                    <input type="text" name="telp_pengirim" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Alamat Dokter</label>
                    <input type="text" name="alamat_pengirim" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Tanggal Form</label>
                    <input type="date" name="tgl_form" class="form-control" required>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Diagnosa Klinis -->
    <div class="col-md-4 d-flex">
        <div class="card border border-dark shadow-lg w-100 h-100 bg-white">
            <div class="card-header bg-secondary text-white fw-bold mb-0" style="font-weight: 800">
                Diagnosa Klinis
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label>Diagnosa/Keterangan Klinik</label>
                    <textarea name="diagnosa_klinis" class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-2">
                    <label>Obat yang Dikonsumsi</label>
                    <textarea name="obat_dikonsumsi" class="form-control" rows="4"></textarea>
                </div>
            </div>
        </div>
    </div>

</div>



        <!-- Card View untuk Data Spesimen -->
<div class="card shadow mb-4">
    <div class="card-header bg-secondary text-white ">
        <h5 class="mb-0" style="font-weight: 800">Data Spesimen</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Asal Sampel -->
            <div class="mb-3 col-md-6">
                <label>Asal Sampel</label><br>
                <?php foreach(['Langsung', 'Kiriman', 'Rujuk'] as $val): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="asal_sampel[]" value="<?= $val ?>">
                        <label class="form-check-label"><?= $val ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Status Puasa -->
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

        <!-- Lokasi Pengambilan -->
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

        <!-- Jenis Spesimen -->
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
    </div>
</div>

      <hr class="my-4">
    <div class="card-header bg-secondary text-white fw-bold mb-0" style="font-weight: 800">
                Jenis Pemeriksaan
            </div>
  <div class="row justify-content-center">
  <!-- HEMATOLOGI -->
  <div class="col-md-4 mb-4">
    <table class="table table-bordered table-md">
      <thead>
        <tr><th colspan="4" class="text-center bg-light">Hematologi</th></tr>
        <tr>
          <th style="width:30px;"></th>
          <th>Pemeriksaan</th>
          <th style="width:80px;">Hasil</th>
          <th style="width:80px;">Paraf</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="pilih_hb"></td>
          <td>Hemoglobin</td>
          <td><input type="text" name="hasil_hb_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_hb_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="pkt_hematologi_rutin"></td>
          <td colspan="3"><strong>Paket Hematologi Rutin</strong></td> <!-- Jadi menyatu sampai kolom paraf -->
        </tr>

        <tr>
          <td></td><td>Hb</td>
          <td><input type="text" name="hasil_hb" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_hb" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Leukosit</td>
          <td><input type="text" name="hasil_leukosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_leukosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Eritrosit</td>
          <td><input type="text" name="hasil_eritrosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_eritrosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Ht</td>
          <td><input type="text" name="hasil_ht_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ht_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Trombosit</td>
          <td><input type="text" name="hasil_trombosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_trombosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="pkt_hematologi_rutin"></td>
          <td colspan="3"><strong>Paket Hematologi Lengkap</strong></td> <!-- Jadi menyatu sampai kolom paraf -->
        </tr>
        <tr>
          <td></td><td>Hb</td>
          <td><input type="text" name="hasil_hb" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_hb" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Leukosit</td>
          <td><input type="text" name="hasil_leukosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_leukosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Eritrosit</td>
          <td><input type="text" name="hasil_eritrosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_eritrosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Ht</td>
          <td><input type="text" name="hasil_ht_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ht_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Trombosit</td>
          <td><input type="text" name="hasil_trombosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_trombosit_hematologi" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>MCV</td>
          <td><input type="text" name="hasil_mcv" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_mcv" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>MCH</td>
          <td><input type="text" name="hasil_mch" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_mch" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>MCHC</td>
          <td><input type="text" name="hasil_mchc" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_mchc" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        
        <tr><td></td><td><strong>Gula Darah</strong></td><td colspan="2"></td></tr>
        <tr>
          <td></td><td>Basofil</td>
          <td><input type="text" name="hasil_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Eosinil</td>
          <td><input type="text" name="hasil_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Netrofil</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Limposit</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Monosit</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>

        <tr>
          <td class="text-center"><input type="checkbox" name="led"></td>
          <td>LED</td>
          <td><input type="text" name="hasil_mchc" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_mchc" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="golongan_darah_slide"></td>
          <td>Golongan Darah (Slide)</td>
          <td><input type="text" name="hasil_mchc" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_mchc" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
      </tbody>
      </tbody>
      </tbody>
    </table>
  </div>

  <!-- KIMIA DARAH -->
  <div class="col-md-4 mb-4">
    <table class="table table-bordered table-md">
      <thead>
        <tr><th colspan="4" class="text-center bg-light">Kimia Darah</th></tr>
        <tr>
          <th style="width:30px;"></th>
          <th>Pemeriksaan</th>
          <th style="width:80px;">Hasil</th>
          <th style="width:80px;">Paraf</th>
        </tr>
      </thead>
      <tbody>
        <tr><td></td><td><strong>Faal Hati</strong></td><td colspan="2"></td></tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_sgot"></td>
          <td>SGOT</td>
          <td><input type="text" name="hasil_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_sgpt"></td>
          <td>SGPT</td>
          <td><input type="text" name="hasil_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="protein_total"></td>
          <td>Protein Total</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_albumin"></td>
          <td>Albumin</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr><td colspan="4" class="py-3"></td></tr>
        <tr><td></td><td><strong>Fungsi Ginjal</strong></td><td colspan="2"></td></tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_sgot"></td>
          <td>Ureum</td>
          <td><input type="text" name="hasil_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_sgpt"></td>
          <td>Creatin</td>
          <td><input type="text" name="hasil_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="protein_total"></td>
          <td>Uric Acid</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr><td colspan="4" class="py-3"></td></tr>
        <tr><td></td><td><strong>Gula Darah</strong></td><td colspan="2"></td></tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_sgot"></td>
          <td>Glukosa Puasa</td>
          <td><input type="text" name="hasil_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_sgpt"></td>
          <td>Glukosa 2 jam PP</td>
          <td><input type="text" name="hasil_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="protein_total"></td>
          <td>Glukosa Sewaktu</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_albumin"></td>
          <td>Hba1c</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr><td colspan="4" class="py-3"></td></tr>
        <tr><td></td><td><strong>Lemak</strong></td><td colspan="2"></td></tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_sgot"></td>
          <td>Paket Profil Lipid</td>
          <td><input type="text" name="hasil_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgot_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_sgpt"></td>
          <td>Cholestrol Total</td>
          <td><input type="text" name="hasil_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_sgpt_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="protein_total"></td>
          <td>Triglyserida</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_albumin"></td>
          <td>HDL Cholesterol</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="faal_albumin"></td>
          <td>LDL Cholesterol</td>
          <td><input type="text" name="hasil_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_albumin_kimia" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        </tbody>
      </tbody>
    </table>
  </div>

  <!-- URINALISA -->
  <div class="col-md-4 mb-4">
    <table class="table table-bordered table-md">
      <thead>
        <tr><th colspan="4" class="text-center bg-light">Urinalisa</th></tr>
        <tr>
          <th style="width:30px;"></th>
          <th>Pemeriksaan</th>
          <th style="width:80px;">Hasil</th>
          <th style="width:80px;">Paraf</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="urin_lengkap"></td>
          <td>Urin Lengkap</td>
        </tr>
        <tr><td></td><td><strong>Makroskopis</strong></td><td colspan="2"></td></tr>
        <tr>
          <td></td><td>Warna</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Kekeruhan</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Berat Jenis</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>pH</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Darah</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Glukosa</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Leukosit</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Protein</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Nitrit</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Bilirubin</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Urobilinogen</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Asam Askorbat</td>
          <td><input type="text" name="hasil_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_ph_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tbody>
        <tr><td></td><td><strong>Mikroskopis</strong></td><td colspan="2"></td></tr>
        <tr>
          <td></td><td>Leukosit</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Eritrosit</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Kristal</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Silinder</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Bakteri</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Parasit</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>

        <tr><td colspan="4" class="py-3"></td></tr>
        
        <tr>
          <td class="text-center"><input type="checkbox" name="urin_lengkap"></td>
          <td>Protein Urin</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="urin_lengkap"></td>
          <td>Glukosa Urin</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="urin_lengkap"></td>
          <td>Tes Kehamilan</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="urin_lengkap"></td>
          <td>Mikroalbumin</td>
          <td><input type="text" name="hasil_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_warna_urinalisa" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>

        </tbody>
      </tbody>
    </table>
  </div>
                 
  <!-- BIOMOLEKULER -->
  <div class="col-md-4 mb-4">
    <table class="table table-bordered table-md">
      <thead>
        <tr><th colspan="4" class="text-center bg-light">Biomolekuler</th></tr>
        <tr>
          <th style="width:30px;"></th>
          <th>Pemeriksaan</th>
          <th style="width:80px;">Hasil</th>
          <th style="width:80px;">Paraf</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="pcr_covid"></td>
          <td>PCR Covid</td>
          <td><input type="text" name="hasil_pcr" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_pcr" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="antigen_covid"></td>
          <td>Antigen Covid</td>
          <td><input type="text" name="hasil_antigen" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_antigen" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- HEMOSTASIS -->
  <div class="col-md-4 mb-4">
    <table class="table table-bordered table-md">
      <thead>
        <tr><th colspan="4" class="text-center bg-light">Hemostasis</th></tr>
        <tr>
          <th style="width:30px;"></th>
          <th>Pemeriksaan</th>
          <th style="width:80px;">Hasil</th>
          <th style="width:80px;">Paraf</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="masa_perdarahan"></td>
          <td>Masa Perdarahan</td>
          <td><input type="text" name="hasil_perdarahan" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_perdarahan" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="masa_pembekuan"></td>
          <td>Masa Pembekuan</td>
          <td><input type="text" name="hasil_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- MIKROBIOLOGI / PARASITOLOGI -->
  <div class="col-md-4 mb-4">
    <table class="table table-bordered table-md">
      <thead>
        <tr><th colspan="4" class="text-center bg-light">Mikrobiologi / Parasitologi</th></tr>
        <tr>
          <th style="width:30px;"></th>
          <th>Pemeriksaan</th>
          <th style="width:80px;">Hasil</th>
          <th style="width:80px;">Paraf</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="malaria"></td>
          <td>Malaria</td>
          <td><input type="text" name="hasil_malaria" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_malaria" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td class="text-center"><input type="checkbox" name="sputum_bta"></td>
          <td>Sputum / BTA</td>
          <td><input type="text" name="hasil_bta" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_bta" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-8 mb-4">
    <div class="card shadow-sm">
      <div class="card-header text-center fw-bold bg-light">IMUNOLOGI</div>
      <div class="card-body">
        <div class="row">
           <!-- Bagian Imunologi Utama -->
          <div class="col-md-6">
            <table class="table table-bordered table-sm mb-3">
              <thead class="table-light text-center">
                <tr>
                  <th style="width: 40px;"></th>
                  <th>Pemeriksaan</th>
                  <th style="width: 80px;">Hasil</th>
                  <th style="width: 80px;">Paraf</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $items = ['NS-1', 'HIV', 'HBsAg', 'Anti HBsAg', 'Anti HAV IgM', 'Anti HCV Total'];
                foreach ($items as $i => $item): ?>
                  <tr>
                    <td class="text-center">
                      <input type="checkbox" name="imunologi[]" value="<?= $item ?>">
                    </td>
                    <td><?= $item ?></td>
                    <td><input type="text" name="hasil_imunologi_<?= $i ?>" class="form-control form-control-sm"></td>
                    <td><input type="text" name="paraf_imunologi_<?= $i ?>" class="form-control form-control-sm"></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Tabel Widal dan Golongan Darah -->
          <div class="col-md-6">
            <table class="table table-bordered table-sm mb-3">
              <thead class="table-light text-center">
                <tr>
                  <th style="width: 40px;"></th>
                  <th>Pemeriksaan</th>
                  <th style="width: 80px;">Hasil</th>
                  <th style="width: 80px;">Paraf</th>
                </tr>
              </thead>
              <tbody>
                <!-- Baris Widal -->
                <tr>
                  <td class="text-center"><input type="checkbox" name="widal" value="1"></td>
                  <td colspan="3">Widal</td>
                </tr>

                <!-- Baris Golongan Darah -->
                <?php
                $golongan = ['O', 'AO', 'BO', 'CO', 'H', 'AH', 'BH', 'CH'];
                foreach ($golongan as $i => $item): ?>
                  <tr>
                    <td></td>
                    <td><?= $item ?></td>
                    <td><input type="text" name="hasil_<?= strtolower($item) ?>" class="form-control form-control-sm text-center"></td>
                    <td><input type="text" name="paraf_<?= strtolower($item) ?>" class="form-control form-control-sm text-center"></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div> <!-- col-md-5 -->
        </div> <!-- row -->
      </div> <!-- card-body -->
    </div> <!-- card -->
  </div> <!-- col -->


  <!-- TOKSIKOLOGI -->
  <div class="col-md-4 mb-4">
    <table class="table table-bordered table-md">
      <thead>
        <tr><th colspan="4" class="text-center bg-light">Toksikologi</th></tr>
        <tr>
          <th style="width:30px;"></th>
          <th>Obat / Zat</th>
          <th style="width:80px;">Hasil</th>
          <th style="width:80px;">Paraf</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center"><input type="checkbox" name="pkt_hematologi_rutin"></td>
          <td colspan="3">Narkoba (6 Parameter)</td> <!-- Jadi menyatu sampai kolom paraf -->
        </tr>
        <tr>
          <td></td><td>Morphin</td>
          <td><input type="text" name="hasil_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Cocaine</td>
          <td><input type="text" name="hasil_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Amphetamin</td>
          <td><input type="text" name="hasil_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Metamphetamine</td>
          <td><input type="text" name="hasil_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Benzodiazepine</td>
          <td><input type="text" name="hasil_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
        <tr>
          <td></td><td>Marijuana</td>
          <td><input type="text" name="hasil_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
          <td><input type="text" name="paraf_pembekuan" class="form-control form-control-sm w-100 mb-1"></td>
        </tr>
      </tbody>
    </table>
  </div>

    <!-- LAIN-LAIN -->
    <div class="col-md-4 mb-4">
    <table class="table table-bordered table-md">
      <thead>
        <tr><th class="text-center bg-light">Lain-lain</th></tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" name="lain1" class="form-control form-control-sm w-100 mb-2" placeholder="Keterangan pemeriksaan lain"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<hr class="my-4">
          <div class="row">
    <!-- Kelayakan, Volume, Biaya -->
    <div class="col-md-6">
        <div class="card shadow mb-4 border border-dark">
            <div class="card-header bg-secondary text-white fw-bold mb-0" style="font-weight: 800">
                Kelayakan Sampel 
            </div>
            <div class="card-body">

                <!-- Kelayakan Sampel -->
                <div class="mb-3">
                    <label><strong>Kelayakan Sampel</strong></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelayakan_sampel" id="layak" value="Layak" onclick="toggleAlasan(false)">
                        <label class="form-check-label" for="layak">Layak</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelayakan_sampel" id="tidak_layak" value="Tidak Layak" onclick="toggleAlasan(true)">
                        <label class="form-check-label" for="tidak_layak">Tidak Layak</label>
                    </div>

                    <!-- Alasan Ketidaklayakan -->
                    <div id="alasanBox" class="mt-3" style="display: none;">
                        <label><strong>Alasan Ketidaklayakan:</strong></label><br>
                        <?php 
                        $alasan = ['Hemolisis','Bahan baku tidak segar','Darah beku','Bahan tidak sesuai permintaan','Tidak steril','Tidak sesuai','Volume tidak mencukupi'];
                        foreach($alasan as $a): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="alasan_tidak_layak[]" value="<?= $a ?>">
                                <label class="form-check-label"><?= $a ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Volume Sampel -->
                <div class="mb-3">
                    <label for="volume_sampel"><strong>Volume Sampel</strong> (misal: 5 ml)</label>
                    <input type="text" name="volume_sampel" id="volume_sampel" class="form-control" placeholder="Masukkan volume sampel">
                    <label class="form-text">Diisi Petugas Penerima Sampel <span class="text-danger">*</span></label>
                </div>
            </div>
        </div>
    </div>

    <!-- Metode Pembayaran -->
    <div class="col-md-6">
        <div class="card shadow mb-4 border border-dark">
            <div class="card-header bg-secondary text-white fw-bold mb-0" style="font-weight: 800">
                Metode Pembayaran
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label><strong>Metode Pembayaran</strong></label><br>
                    <!-- Jumlah Biaya -->
                <div class="mb-3">
                    <label for="jumlah_biaya"><strong>Jumlah Biaya</strong></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="jumlah_biaya" id="jumlah_biaya" placeholder="Masukkan jumlah biaya">
                    </div>
                </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="cash" value="Cash">
                        <label class="form-check-label" for="cash">Cash / Tunai</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="bpjs" value="BPJS">
                        <label class="form-check-label" for="bpjs">BPJS</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="metode_pembayaran" id="lainnya" value="Lain-lain">
                        <label class="form-check-label" for="lainnya">Lain-lain</label>
                    </div>
                    <input type="text" name="metode_lainnya" id="metode_lainnya" class="form-control mt-2" placeholder="Tuliskan metode lain" style="display: none;">
                </div>
                <label class="form-text">Diisi Petugas Pendaftaran <span class="text-danger">*</span></label>
            </div>
        </div>
    </div>
</div>
        <!-- Script untuk toggle input lain-lain -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const lainRadio = document.getElementById('lainnya');
                const inputLain = document.getElementById('metode_lainnya');
                const radios = document.querySelectorAll('input[name="metode_pembayaran"]');

                radios.forEach(r => {
                    r.addEventListener('change', function () {
                        if (lainRadio.checked) {
                            inputLain.style.display = 'block';
                        } else {
                            inputLain.style.display = 'none';
                            inputLain.value = '';
                        }
                    });
                });
            });
        </script>
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
                <script>
        function toggleAlasan(show) {
            const alasanBox = document.getElementById('alasanBox');
            if (show) {
                alasanBox.style.display = 'block';
            } else {
                alasanBox.style.display = 'none';

                // Reset semua checkbox ketika kembali ke "Layak"
                const checkboxes = alasanBox.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(cb => cb.checked = false);
            }
        }
        </script>
            <div class="text-end">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('form_permintaan_klinik') ?>" class="btn btn-secondary">Kembali</a>
      </div>
        </div>
          </div>