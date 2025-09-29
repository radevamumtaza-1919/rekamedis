<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Data Pembayaran</h3>

    <a href="<?= site_url('pembayaran/add') ?>" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>No. Register</th>
                    <th>Nama Pasien</th>
                    <th>Total Biaya (Rp)</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Tanggal Pelunasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pembayaran)): ?>
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data pembayaran.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pembayaran as $i => $p): ?>
                        <tr>
                            <td class="text-center"><?= $i + 1 ?></td>
                            <td><?= $p->no_register ?></td>
                            <td><?= $p->nama_pasien ?></td>
                            <td class="text-end">Rp <?= number_format($p->total_biaya, 0, ',', '.') ?></td>
                            <td class="text-center"><?= $p->metode_pembayaran ?></td>
                            <td class="text-center">
                                <?php if ($p->status === 'Belum Lunas'): ?>
                                    <span class="text-danger fw-bold"><?= $p->status ?></span>
                                <?php else: ?>
                                    <span class="text-success fw-bold"><?= $p->status ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $p->keterangan ?></td>
                            <td class="text-center"><?= $p->tanggal_pelunasan ? date('d-m-Y H:i', strtotime($p->tanggal_pelunasan)) : '-' ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="<?= site_url('pembayaran/edit/' . $p->id_pembayaran) ?>" class="btn btn-light btn-sm" title="Edit">
                                        <i class="fas fa-edit text-warning"></i>
                                    </a>
                                    <a href="<?= site_url('pembayaran/delete/' . $p->id_pembayaran) ?>" class="btn btn-light btn-sm" title="Hapus" onclick="return confirm('Yakin hapus data ini?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
