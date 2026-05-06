<div class="content-wrapper px-4 pt-4">
    <h3 class="text-primary fw-bold mb-4"><?= $title ?></h3>

    <form action="<?= isset($sampel) ? site_url('ambil_sampel/update/' . $sampel->id_ambil_sampel) : site_url('ambil_sampel/create') ?>" method="post">
        
        <!-- === DATA PASIEN === -->
        <h5 class="fw-bold text-secondary">📌 Identitas Pasien</h5>
        <div class="mb-3">
            <label for="id_pasien" class="form-label">No. Register & Nama Pasien</label>
            <select name="id_pasien" id="id_pasien" class="form-select" required>
                <option value="">-- Pilih Pasien --</option>
                <?php foreach ($pasien as $p): ?>
                    <option value="<?= $p->id_pasien ?>" <?= isset($sampel) && $sampel->id_pasien == $p->id_pasien ? 'selected' : '' ?>>
                        <?= $p->no_register ?> - <?= $p->nama_pasien ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- === DATA SAMPEL === -->
        <h5 class="fw-bold text-secondary mt-4">🧪 Data Sampel</h5>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="jenis_sampel" class="form-label">Jenis Sampel</label>
                <select name="jenis_sampel" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <?php
                        $opsi = ['Darah', 'Urine', 'Swab', 'Faeces', 'Jaringan', 'Sputum', 'Cairan', 'Lain-lain'];
                        foreach ($opsi as $o) {
                            $selected = (isset($sampel) && $sampel->jenis_sampel == $o) ? 'selected' : '';
                            echo "<option value='$o' $selected>$o</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="kelayakan" class="form-label">Kelayakan Sampel</label>
                <select name="kelayakan" id="kelayakan" class="form-select" required onchange="toggleAlasan()">
                    <option value="">-- Pilih --</option>
                    <option value="Layak" <?= isset($sampel) && $sampel->kelayakan == 'Layak' ? 'selected' : '' ?>>Layak</option>
                    <option value="Tidak Layak" <?= isset($sampel) && $sampel->kelayakan == 'Tidak Layak' ? 'selected' : '' ?>>Tidak Layak</option>
                </select>
            </div>
        </div>

        <div class="mb-3" id="alasan-container" style="display: none;">
            <label>Alasan Sampel Tidak Layak</label>
            <select name="alasan_tidak_layak" class="form-select">
                <option value="">-- Pilih Alasan --</option>
                <?php
                    $alasan_opsi = [
                        'Hemolisis', 'Bahan tidak segar', 'Darah beku',
                        'Bahan baku tidak sesuai permintaan', 'Tidak steril',
                        'Tidak sesuai', 'Volume tidak mencukupi'
                    ];
                    foreach ($alasan_opsi as $alasan) {
                        $selected = isset($sampel) && $sampel->alasan_tidak_layak == $alasan ? 'selected' : '';
                        echo "<option value='$alasan' $selected>$alasan</option>";
                    }
                ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="lokasi_pengambilan" class="form-label">Lokasi Pengambilan</label>
                <select name="lokasi_pengambilan" class="form-select" required>
                    <option value="">-- Pilih Lokasi --</option>
                    <?php
                        $lokasi_opsi = ['tangan', 'paha', 'rectal', 'nasofaring', 'orofaring', 'lain-lain'];
                        foreach ($lokasi_opsi as $lokasi) {
                            $selected = isset($sampel) && $sampel->lokasi_pengambilan == $lokasi ? 'selected' : '';
                            echo "<option value='$lokasi' $selected>$lokasi</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="jam_pengambilan" class="form-label">Jam Pengambilan</label>
                <input type="time" name="jam_pengambilan" class="form-control" required
                    value="<?= isset($sampel) ? $sampel->jam_pengambilan : '' ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="volume" class="form-label">Volume Sampel</label>
                <input type="text" name="volume" class="form-control" placeholder="Contoh: 3 ml" required value="<?= isset($sampel) ? $sampel->volume : '' ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="tanggal_permintaan" class="form-label">Tanggal Permintaan</label>
                <input type="date" name="tanggal_permintaan" class="form-control" required value="<?= isset($sampel) ? $sampel->tanggal_permintaan : '' ?>">
            </div>
        </div>

        <!-- === INFORMASI TAMBAHAN === -->
        <div class="mb-3">
            <label for="informasi_tambahan" class="form-label">Informasi Tambahan (Opsional)</label>
            <textarea name="informasi_tambahan" class="form-control" rows="3"><?= isset($sampel) ? $sampel->informasi_tambahan : '' ?></textarea>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <a href="<?= site_url('ambil_sampel') ?>" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-primary">💾 Simpan</button>
        </div>

    </form>
</div>

<script>
    function toggleAlasan() {
        const kelayakan = document.getElementById('kelayakan').value;
        const alasanContainer = document.getElementById('alasan-container');
        alasanContainer.style.display = (kelayakan === 'Tidak Layak') ? 'block' : 'none';
    }

    // Jalankan saat halaman dimuat
    window.onload = toggleAlasan;
</script>
