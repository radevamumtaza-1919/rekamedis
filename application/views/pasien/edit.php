<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Edit Pasien</h3>
    <form action="<?= site_url('pasien/update/' . $pasien->id_pasien) ?>" method="post">
        <div class="mb-3">
            <label>No Register</label>
            <input type="text" name="no_register" value="<?= $pasien->no_register ?>" class="form-control" readonly>

        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama_pasien" value="<?= $pasien->nama_pasien ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" value="<?= $pasien->nik ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="<?= $pasien->tgl_lahir ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat_pasien" value="<?= $pasien->alamat_pasien?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-select" required>
                <option value="Laki-laki" <?= $pasien->gender == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $pasien->gender == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
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
            <label>No. Telp</label>
            <input type="text" name="no_telp_pasien" value="<?= $pasien->no_telp_pasien ?>" class="form-control">
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

            <div class="mb-3" id="diagnosa_field">
    <label class="form-label">Diagnosa/Keterangan Klinik</label>
    <textarea name="diagnosa" class="form-control"><?= isset($pasien) ? $pasien->diagnosa : '' ?></textarea>
</div>

<div class="mb-3" id="obat_field">
    <label class="form-label">Obat yang Dikonsumsi</label>
    <input type="text" name="obat" class="form-control" value="<?= isset($pasien) ? $pasien->obat : '' ?>">
</div>



        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('pasien') ?>" class="btn btn-secondary">Batal</a>
    </form>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const statusSelect = document.getElementById('status_pasien');
    const dokterField = document.getElementById('dokter_pengirim_field');
    const diagnosaField = document.getElementById('diagnosa_field');
    const obatField = document.getElementById('obat_field');

    function toggleRujukanFields() {
        if (statusSelect.value === 'Rujukan') {
            dokterField.style.display = 'block';
            diagnosaField.style.display = 'block';
            obatField.style.display = 'block';
        } else {
            dokterField.style.display = 'none';
            diagnosaField.style.display = 'none';
            obatField.style.display = 'none';

            // Optional: reset value jika status bukan rujukan
            document.getElementById('id_dokter_pengirim').value = '';
            document.getElementsByName('diagnosa')[0].value = '';
            document.getElementsByName('obat')[0].value = '';
        }
    }

    // Initial check
    toggleRujukanFields();

    // On change
    statusSelect.addEventListener('change', toggleRujukanFields);
});
</script>


</div>
