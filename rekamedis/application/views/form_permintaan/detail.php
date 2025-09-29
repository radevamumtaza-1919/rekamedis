<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Detail Formulir Permintaan Pemeriksaan</h3>
    <a href="<?= site_url('form_permintaan') ?>" class="btn btn-secondary mb-3">← Kembali</a>

    <!-- DATA PASIEN -->
    <div class="card mb-3 shadow-sm">
        <div class="card-header bg-primary text-white">Identitas Pasien</div>
        <div class="card-body row">
            <div class="col-md-6"><strong>No. Register:</strong> <?= $form->no_register ?></div>
            <div class="col-md-6"><strong>Nama:</strong> <?= $form->nama_pasien ?></div>
            <div class="col-md-6"><strong>NIK:</strong> <?= $form->nik ?></div>
            <div class="col-md-6"><strong>Jenis Kelamin:</strong> <?= $form->gender ?></div>
            <div class="col-md-6"><strong>Tanggal Lahir:</strong> <?= $form->tgl_lahir ?></div>
            <div class="col-md-6"><strong>No. Telp:</strong> <?= $form->telp_pasien ?></div>
            <div class="col-12"><strong>Alamat:</strong> <?= $form->alamat_pasien ?></div>
        </div>
    </div>

    <!-- DOKTER PENGIRIM -->
    <div class="card mb-3 shadow-sm">
        <div class="card-header bg-success text-white">Identitas Pengirim</div>
        <div class="card-body row">
            <div class="col-md-6"><strong>Nama Dokter:</strong> <?= $form->nama_dokter ?></div>
            <div class="col-md-6"><strong>No. Telp:</strong> <?= $form->telp_pengirim ?></div>
            <div class="col-12"><strong>Alamat Dokter:</strong> <?= $form->alamat_pengirim ?></div>
        </div>
    </div>

    <!-- DATA PERMINTAAN -->
    <div class="card mb-3 shadow-sm">
        <div class="card-header bg-warning text-dark">Permintaan Pemeriksaan</div>
        <div class="card-body row">
            <div class="col-md-6"><strong>Tanggal Form:</strong> <?= $form->tgl_form ?></div>
            <div class="col-md-6"><strong>Tanggal Permintaan:</strong> <?= $form->tgl_permintaan ?></div>
            <div class="col-md-6"><strong>Jenis Spesimen:</strong> <?= $form->jenis_spesimen ?></div>
            <div class="col-md-6"><strong>Asal Sampel:</strong> <?= $form->asal_sampel ?></div>
            <div class="col-md-6"><strong>Status Puasa:</strong> <?= $form->puasa ?></div>
            <div class="col-md-6"><strong>Volume Spesimen:</strong> <?= $form->volume_spesimen ?></div>
            <div class="col-md-6"><strong>Tanggal Pengambilan:</strong> <?= $form->tgl_pengambilan ?></div>
            <div class="col-md-6"><strong>Jam Pengambilan:</strong> <?= $form->jam_pengambilan ?></div>
            <div class="col-md-6"><strong>Lokasi Pengambilan:</strong> <?= $form->lokasi_pengambilan ?></div>
            <div class="col-md-6"><strong>Prioritas:</strong> <?= $form->prioritas ?></div>
            <div class="col-12"><strong>Diagnosa Klinis:</strong> <?= $form->diagnosa_klinis ?></div>
            <div class="col-12"><strong>Obat yang Dikonsumsi:</strong> <?= $form->obat_dikonsumsi ?></div>
            <div class="col-12"><strong>Informasi Tambahan:</strong> <?= $form->info_tambahan ?></div>
        </div>
    </div>

    <!-- TOMBOL CETAK -->
    <a href="<?= site_url('form_permintaan/print/' . $form->id) ?>" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-print"></i> Cetak PDF
    </a>
</div>
