<style>
    .form-box {
        border: 1px solid #000;
        padding: 10px;
        margin-bottom: 15px;
    }

    .form-title {
        font-weight: bold;
        background: #eaeaea;
        padding: 5px 10px;
        border-bottom: 1px solid #000;
    }

    .form-content {
        padding: 5px 10px;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 5px;
    }

    .form-label {
        width: 200px;
        font-weight: bold;
    }

    .form-value {
        flex: 1;
    }
</style>

<div class="container mt-4">
    <h4 class="text-center mb-4">FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM KLINIK</h4>
    <a href="<?= site_url('form_permintaan') ?>" class="btn btn-secondary mb-3">← Kembali</a>

    <!-- IDENTITAS PASIEN -->
    <div class="form-box">
        <div class="form-title">1. Identitas Pasien</div>
        <div class="form-content">
            <div class="form-row"><div class="form-label">No. Register</div><div class="form-value"><?= $form->no_register ?></div></div>
            <div class="form-row"><div class="form-label">Nama</div><div class="form-value"><?= $form->nama_pasien ?></div></div>
            <div class="form-row"><div class="form-label">NIK</div><div class="form-value"><?= $form->nik ?></div></div>
            <div class="form-row"><div class="form-label">Jenis Kelamin</div><div class="form-value"><?= $form->gender ?></div></div>
            <div class="form-row"><div class="form-label">Tanggal Lahir / Umur</div><div class="form-value"><?= $form->tgl_lahir ?> / <?= $form->umur ?></div></div>
            <div class="form-row"><div class="form-label">Alamat</div><div class="form-value"><?= $form->alamat_pasien ?></div></div>
            <div class="form-row"><div class="form-label">No. Telp</div><div class="form-value"><?= $form->no_telp_pasien ?></div></div>
        </div>
    </div>

    <!-- IDENTITAS PENGIRIM -->
    <div class="form-box">
        <div class="form-title">2. Identitas Pengirim</div>
        <div class="form-content">
            <div class="form-row"><div class="form-label">Nama Dokter</div><div class="form-value"><?= $form->nama_dokter ?></div></div>
            <div class="form-row"><div class="form-label">Alamat</div><div class="form-value"><?= $form->alamat_pengirim ?></div></div>
            <div class="form-row"><div class="form-label">No. Telp</div><div class="form-value"><?= $form->telp_pengirim ?></div></div>
            <div class="form-row"><div class="form-label">Tanggal</div><div class="form-value"><?= $form->tgl_form ?></div></div>
        </div>
    </div>

    <!-- DIAGNOSA KLINIS -->
    <div class="form-box">
        <div class="form-title">3. Diagnosa / Keterangan Klinik</div>
        <div class="form-content"><?= $form->diagnosa_klinis ?></div>
    </div>

    <!-- OBAT YANG DIKONSUMSI -->
    <div class="form-box">
        <div class="form-title">Obat yang Dikonsumsi</div>
        <div class="form-content"><?= $form->obat_dikonsumsi ?></div>
    </div>

    <!-- SAMPEL DAN JADWAL -->
    <div class="form-box">
        <div class="form-title">Data Spesimen</div>
        <div class="form-content">
            <div class="form-row"><div class="form-label">Asal Sampel</div><div class="form-value"><?= $form->asal_sampel ?></div></div>
            <div class="form-row"><div class="form-label">Status Puasa</div><div class="form-value"><?= $form->puasa ?></div></div>
            <div class="form-row"><div class="form-label">Tanggal Permintaan</div><div class="form-value"><?= $form->tgl_permintaan ?></div></div>
            <div class="form-row"><div class="form-label">Tanggal Pengambilan</div><div class="form-value"><?= $form->tgl_pengambilan ?></div></div>
            <div class="form-row"><div class="form-label">Jam Pengambilan</div><div class="form-value"><?= $form->jam_pengambilan ?></div></div>
            <div class="form-row"><div class="form-label">Volume Spesimen</div><div class="form-value"><?= $form->volume_spesimen ?></div></div>
        </div>
    </div>

    <!-- LOKASI PENGAMBILAN -->
    <div class="form-box">
        <div class="form-title">Lokasi Pengambilan</div>
        <div class="form-content"><?= $form->lokasi_pengambilan ?><?= $form->lokasi_lainnya ? ', ' . $form->lokasi_lainnya : '' ?></div>
    </div>

    <!-- JENIS SPESIMEN -->
    <div class="form-box">
        <div class="form-title">Jenis Spesimen</div>
        <div class="form-content"><?= $form->jenis_spesimen ?><?= $form->spesimen_lainnya ? ', ' . $form->spesimen_lainnya : '' ?></div>
    </div>

    <!-- INFORMASI TAMBAHAN -->
    <div class="form-box">
        <div class="form-title">Informasi Tambahan</div>
        <div class="form-content"><?= $form->info_tambahan ?></div>
    </div>

    <!-- PRIORITAS -->
    <div class="form-box">
        <div class="form-title">Prioritas</div>
        <div class="form-content"><?= $form->prioritas ?></div>
    </div>

    <!-- TOMBOL -->
    <div class="mt-3">
        <a href="<?= site_url('form_permintaan/print/' . $form->id) ?>" class="btn btn-outline-primary" target="_blank">
            <i class="fas fa-print"></i> Cetak PDF
        </a>
    </div>
</div>
