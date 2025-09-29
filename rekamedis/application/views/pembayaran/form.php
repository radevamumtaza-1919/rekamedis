<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4"><?= $title ?></h3>

    <form action="<?= isset($pembayaran) ? site_url('pembayaran/save/' . $pembayaran->id_pembayaran) : site_url('pembayaran/save') ?>" method="post">

        <div class="mb-3">
            <label for="no_register" class="form-label">No. Register Pasien</label>
            <select name="no_register" class="form-select" required>
                <option value="">-- Pilih Pasien --</option>
                <?php foreach ($pasien as $p): ?>
                    <option value="<?= $p->no_register ?>" <?= isset($pembayaran) && $pembayaran->no_register == $p->no_register ? 'selected' : '' ?>>
                        <?= $p->no_register ?> - <?= $p->nama_pasien ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="total_biaya" class="form-label">Jumlah Biaya (Rp)</label>
            <input type="number" name="total_biaya" class="form-control" value="<?= isset($pembayaran) ? $pembayaran->total_biaya : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="Tunai" <?= isset($pembayaran) && $pembayaran->metode_pembayaran == 'Tunai' ? 'selected' : '' ?>>Tunai</option>
                <option value="BPJS" <?= isset($pembayaran) && $pembayaran->metode_pembayaran == 'BPJS' ? 'selected' : '' ?>>BPJS</option>
                <option value="Lain-lain" <?= isset($pembayaran) && $pembayaran->metode_pembayaran == 'Lain-lain' ? 'selected' : '' ?>>Lain-lain</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status Pembayaran</label>
            <select name="status" id="status" class="form-select" onchange="toggleTanggal()" required>
                <option value="">-- Pilih --</option>
                <option value="Belum Lunas" <?= isset($pembayaran) && $pembayaran->status == 'Belum Lunas' ? 'selected' : '' ?>>Belum Lunas</option>
                <option value="Lunas" <?= isset($pembayaran) && $pembayaran->status == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan Pemeriksaan</label>
            <textarea name="keterangan" class="form-control" rows="3"><?= isset($pembayaran) ? $pembayaran->keterangan : '' ?></textarea>
        </div>

        <div class="mb-3" id="tanggal-container" style="<?= isset($pembayaran) && $pembayaran->status == 'Lunas' ? 'display:block;' : 'display:none;' ?>">
            <label for="tanggal_pelunasan" class="form-label">Tanggal Pelunasan</label>
            <input type="datetime-local" name="tanggal_pelunasan" id="tanggal_pelunasan" class="form-control"
                value="<?= isset($pembayaran) && $pembayaran->tanggal_pelunasan ? date('Y-m-d\TH:i', strtotime($pembayaran->tanggal_pelunasan)) : '' ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('pembayaran') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
function toggleTanggal() {
    const status = document.getElementById('status').value;
    const container = document.getElementById('tanggal-container');
    const inputTanggal = document.getElementById('tanggal_pelunasan');

    if (status === 'Lunas') {
        container.style.display = 'block';
        const now = new Date();
        inputTanggal.value = now.toISOString().slice(0, 16);
    } else {
        container.style.display = 'none';
        inputTanggal.value = '';
    }
}
</script>
