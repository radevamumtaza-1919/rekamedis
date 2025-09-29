<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Data Pasien</h3>
    <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">
    <a href="<?= site_url('pasien/create') ?>" class="btn btn-primary mb-3">Tambah Pasien</a>
    <form action="<?= site_url('pasien') ?>" method="get" class="mb-3">
    <div class="input-group">
        <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan NIK" value="<?= $this->input->get('keyword') ?>">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
        <a href="<?= site_url('pasien') ?>" class="btn btn-outline-secondary">Reset</a>
    </div>
</form>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>No. Register</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Tanggal Lahir & Umur</th>
                    <th>Alamat</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>No. Telp</th>
                    <th>Dokter Pengirim</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pasien)): ?>
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data pasien</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pasien as $i => $p): ?>
                        <tr>
                            <td class="text-center"><?= $i + 1 ?></td>
                            <td class="text-center"><?= $p->no_register ?></td>
                            <td><?= $p->nama_pasien ?></td>
                            <td class="text-center"><?= $p->nik ?></td>
                            <td class="text-center">
                                <?= $p->tgl_lahir ?><br>
                                <small class="text-muted">
                                    <?php
                                        $lahir = new DateTime($p->tgl_lahir);
                                        $sekarang = new DateTime();
                                        $umur = $sekarang->diff($lahir);
                                        echo $umur->y . ' tahun';
                                    ?>
                                </small>
                            </td>
                            <td><?= $p->alamat_pasien ?></td>
                            <td class="text-center"><?= $p->gender ?></td>
                            <td class="text-center">
                                <span class="badge bg-<?= $p->status_pasien == 'Mandiri' ? 'success' : 'primary' ?>">
                                    <?= $p->status_pasien ?>
                                </span>
                            </td>
                            <td class="text-center"><?= $p->no_telp_pasien ?></td>
                            <td><?= $p->nama_dokter ?? '-' ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="<?= site_url('pasien/show/' . $p->id_pasien) ?>" class="btn btn-light btn-sm" title="Lihat">
                                        <i class="fas fa-eye text-info"></i>
                                    </a>
                                    <a href="<?= site_url('pasien/edit/' . $p->id_pasien) ?>" class="btn btn-light btn-sm" title="Edit">
                                        <i class="fas fa-edit text-warning"></i>
                                    </a>
                                    <a href="<?= site_url('pasien/delete/' . $p->id_pasien) ?>" class="btn btn-light btn-sm" title="Hapus" onclick="return confirm('Hapus data pasien ini?')">
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
