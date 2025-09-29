<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Data Ambil Sampel</h3>

    <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

    <a href="<?= site_url('ambil_sampel/add') ?>" class="btn btn-primary mb-3">Tambah Data Sampel</a>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= site_url('ambil_sampel') ?>" method="get" class="mb-3">
    <div class="input-group">
        <input type="text" name="nik" class="form-control" placeholder="Cari berdasarkan NIK pasien..." value="<?= $this->input->get('nik') ?>">
        <button class="btn btn-primary" type="submit">Cari</button>
        <?php if ($this->input->get('nik')): ?>
            <a href="<?= site_url('ambil_sampel') ?>" class="btn btn-secondary">Reset</a>
        <?php endif; ?>
    </div>
</form>


    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
    <tr>
        <th>No</th>
        <th>No. Register</th>
        <th>Nama Pasien</th>
        <th>Jenis Sampel</th>
        <th>Kelayakan</th>
        <th>Alasan Tidak Layak</th>
        <th>Volume Sampel</th>
        <th>Lokasi Pengambilan</th>
        <th>Jam Pengambilan</th>
        <th>Tanggal Permintaan</th>
        <th>Informasi Tambahan</th>
        <th>Waktu Input</th>
        <th>Aksi</th>
    </tr>
</thead>
    <tbody>
        <?php if (empty($sampel)): ?>
            <tr>
                <td colspan="8" class="text-center">Belum ada data sampel</td>
            </tr>
        <?php else: ?>
        <?php foreach ($sampel as $i => $s): ?>
            <tr>
                <td class="text-center"><?= $i + 1 ?></td>
                <td class="text-center"><?= $s->no_register ?></td>
                <td><?= $s->nama_pasien ?></td>
                <td><?= $s->jenis_sampel ?></td>
                <td class="text-center">
                    <?php if ($s->kelayakan === 'Tidak Layak'): ?>
                        <span class="text-danger fw-bold"><?= $s->kelayakan ?></span>
                    <?php else: ?>
                        <span><?= $s->kelayakan ?></span>
                    <?php endif; ?>
                </td>
                <td><?= $s->kelayakan === 'Tidak Layak' ? $s->alasan_tidak_layak : '-' ?></td>
                <td class="text-center"><?= $s->volume ?></td>
                <td class="text-center"><?= $s->lokasi_pengambilan ?></td>
                <td class="text-center">
                    <?= $s->jam_pengambilan ? date('H:i', strtotime($s->jam_pengambilan)) : '-' ?>
                </td>
                <td class="text-center"><?= $s->tanggal_permintaan ? date('d-m-Y', strtotime($s->tanggal_permintaan)) : '-' ?></td>
                <td><?= $s->informasi_tambahan ?></td>
                <td class="text-center"><?= date('d-m-Y H:i', strtotime($s->created_at)) ?></td>
                <td class="text-center">
                <div class="d-flex justify-content-center gap-1">
                <a href="<?= site_url('ambil_sampel/edit/' . $s->id_ambil_sampel) ?>" class="btn btn-light btn-sm" title="Edit">
                    <i class="fas fa-edit text-warning"></i>
                </a>
                <a href="<?= site_url('ambil_sampel/delete/' . $s->id_ambil_sampel) ?>" class="btn btn-light btn-sm" title="Hapus" onclick="return confirm('Hapus data ini?')">
                    <i class="fas fa-trash text-danger"></i>
                </a>
                <a href="<?= site_url('ambil_sampel/print/' . $s->id_ambil_sampel) ?>" target="_blank" class="btn btn-light btn-sm" title="Print">
                    <i class="fas fa-print text-info"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; ?>
<?php endif; ?>
    </tbody>
        </table>
            </div>
                </div>
