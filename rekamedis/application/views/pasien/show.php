<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4"><i class="fas fa-user-circle me-2"></i> Detail Pasien</h3>
    <a href="<?= site_url('pasien') ?>" class="btn btn-outline-secondary mb-4">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Pasien
    </a>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-id-badge me-2"></i> Informasi Pasien
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>No. Register:</strong><br>
                    <?= $pasien->no_register ?>
                </div>
                <div class="col-md-6">
                    <strong>Nama:</strong><br>
                    <?= $pasien->nama_pasien ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>NIK:</strong><br>
                    <?= $pasien->nik ?>
                </div>
                <div class="col-md-6">
                    <strong>Tanggal Lahir:</strong><br>
                    <?= $pasien->tgl_lahir ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Alamat:</strong><br>
                    <?= $pasien->alamat_pasien ?>
                </div>
                <div class="col-md-6">
                    <strong>Jenis Kelamin:</strong><br>
                    <?= $pasien->gender ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Status Pasien:</strong><br>
                    <span class="badge bg-<?= $pasien->status_pasien == 'Rujukan' ? 'primary' : 'success' ?>">
                        <?= $pasien->status_pasien ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <strong>No. Telp:</strong><br>
                    <?= $pasien->no_telp_pasien ?>
                </div>
            </div>

            <?php if ($pasien->status_pasien == 'Rujukan'): ?>
<hr class="my-4">
<h5 class="fw-bold text-primary"><i class="fas fa-stethoscope me-2"></i> Rujukan</h5>

<div class="row mb-3">
    <div class="col-md-6">
        <strong>Dokter Pengirim:</strong><br>
        <?= $pasien->nama_dokter ?>
    </div>
    <div class="col-md-6">
        <strong>Obat yang Dikonsumsi:</strong><br>
        <?= $pasien->obat ?>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <strong>Alamat Dokter:</strong><br>
        <?= $pasien->alamat_dokter ?>
    </div>

<div class="col-md-6">
    <strong>Diagnosa/Keterangan Klinik:</strong><br>
    <?= $pasien->diagnosa ?>
</div>

<div class="col-md-6">
        <strong>No. Telp Dokter:</strong><br>
        <?= $pasien->telp_dokter ?>
    </div>
</div>

<?php endif; ?>

        </div>
    </div>
</div>
