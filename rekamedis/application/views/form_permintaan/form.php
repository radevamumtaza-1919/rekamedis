<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Formulir Permintaan Pemeriksaan</h3>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('form_permintaan/create') ?>" method="post" class="card card-body shadow-sm">

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

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">Kembali</a>
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