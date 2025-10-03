<div class="content-wrapper px-4 pt-4">
  <section class="content">
    <div class="container-fluid">
<form action="<?= site_url('pasien/create') ?>" method="post">
    <!-- CSRF token (jika diaktifkan di config) -->
    <?php if($this->security->get_csrf_hash()): ?>
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
    <?php endif; ?>

    <div class="mb-3">
    <label>No. Register</label>
    <input type="text" name="no_register" class="form-control" value="<?= isset($no_register) ? $no_register : '' ?>" readonly>
</div>


    <div class="mb-3">
        <label for="nama_pasien" class="form-label">Nama Pasien</label>
        <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" placeholder="Masukkan nama pasien" required>
    </div>
    
    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan NIK" required>
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Jenis Kelamin</label>
        <select id="gender" name="gender" class="form-select" required>
            <option value="" disabled selected>Pilih jenis kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
    <label class="form-label">Status Pasien</label>
    <select name="status_pasien" class="form-select" id="status_pasien" required>
        <option value="Mandiri" <?= isset($pasien) && $pasien->status_pasien == 'Mandiri' ? 'selected' : '' ?>>Mandiri</option>
        <option value="Rujukan" <?= isset($pasien) && $pasien->status_pasien == 'Rujukan' ? 'selected' : '' ?>>Rujukan</option>
        </select>
    </div>


    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="alamat_pasien" class="form-label">Alamat</label>
        <input type="text" id="alamat_pasien" name="alamat_pasien" class="form-control" placeholder="Masukkan alamat pasien" required>
    </div>

        <div class="mb-3">
            <label for="no_telp_pasien" class="form-label">No. Telp</label>
            <input type="text" id="no_telp_pasien" name="no_telp_pasien" class="form-control" placeholder="Masukkan nomor telepon" required>
        </div>

            <div class="mb-3" id="dokter_pengirim_field">
            <label for="id_dokter_pengirim" class="form-label">Dokter Pengirim</label>
            <select name="id_dokter_pengirim" id="id_dokter_pengirim" class="form-select">
                <option value="">-- Pilih Dokter --</option>
                <?php foreach ($dokter as $d): ?>
                    <option value="<?= $d->id_dokter_pengirim ?>" 
                        <?= isset($pasien) && $pasien->id_dokter_pengirim == $d->id_dokter_pengirim ? 'selected' : '' ?>>
                        <?= $d->nama ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
            <<div id="rujukan_field">
        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa / Keterangan Klinik</label>
            <textarea id="diagnosa" name="diagnosa" class="form-control" rows="2" placeholder="Masukkan diagnosa atau keterangan klinik"></textarea>
        </div>

            <div class="mb-3">
                <label for="obat" class="form-label">Obat yang Dikonsumsi</label>
                <input type="text" id="obat" name="obat" class="form-control" placeholder="Masukkan obat yang sedang dikonsumsi">
            </div>
        </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('pasien') ?>" class="btn btn-secondary">Batal</a>
                </form>
                </div>
                </section>
            <script>
        document.addEventListener("DOMContentLoaded", function () {
            const statusSelect = document.getElementById('status_pasien');
            const dokterField = document.getElementById('dokter_pengirim_field');
            const rujukanField = document.getElementById('rujukan_field');

            function toggleFields() {
                if (statusSelect.value === 'Rujukan') {
                    dokterField.style.display = 'block';
                    rujukanField.style.display = 'block';
                } else {
                    dokterField.style.display = 'none';
                    rujukanField.style.display = 'none';
                    document.getElementById('id_dokter_pengirim').value = '';
                    document.getElementById('diagnosa').value = '';
                    document.getElementById('obat').value = '';
                }
            }

            toggleFields(); // Saat halaman dimuat
            statusSelect.addEventListener('change', toggleFields); // Saat status berubah
        });
        </script>
    </div>