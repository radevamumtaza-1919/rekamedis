<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Data Dokter Pengirim</h3>

    <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

    <a href="<?= site_url('dokter_pengirim/add') ?>" class="btn btn-primary mb-3">Tambah Dokter</a>

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

        <form action="<?= site_url('dokter_pengirim') ?>" method="get" class="mb-3">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Cari nama/alamat/no telp..." value="<?= $this->input->get('q') ?>">
        <button class="btn btn-primary" type="submit">Cari</button>
        <?php if ($this->input->get('q')): ?>
            <a href="<?= site_url('dokter_pengirim') ?>" class="btn btn-secondary">Reset</a>
        <?php endif; ?>
    </div>
</form>



    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Instansi / Dokter</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($dokter_pengirim)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data dokter</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($dokter_pengirim as $i => $d): ?>
<tr>
    <td class="text-center"><?= $i + 1 ?></td>
    <td><?= $d->nama ?></td>
    <td><?= $d->alamat ?></td>
    <td class="text-center"><?= $d->no_telp ?></td>
    <td class="text-center"><?= date('d-m-Y H:i', strtotime($d->created_at)) ?></td> <!-- Tambahan -->
    <td class="text-center">
        <div class="d-flex justify-content-center gap-1">
            <a href="<?= site_url('dokter_pengirim/edit/' . $d->id_dokter_pengirim) ?>" class="btn btn-light btn-sm" title="Edit">
                <i class="fas fa-edit text-warning"></i>
            </a>
            <a href="<?= site_url('dokter_pengirim/delete/' . $d->id_dokter_pengirim) ?>" class="btn btn-light btn-sm" title="Hapus" onclick="return confirm('Hapus data ini?')">
                <i class="fas fa-trash text-danger"></i>
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
