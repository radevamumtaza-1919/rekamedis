<div class="content-wrapper px-4 pt-4">
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $hariIndo = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];
    $bulanIndo = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    ];
    $hari = $hariIndo[date('l')];
    $tanggal = date('d');
    $bulan = $bulanIndo[date('F')];
    $tahun = date('Y');
    $tanggalLengkap = "$hari, $tanggal $bulan $tahun";
    ?>

    <h3 class="text-dark fw-bold mb-4 d-flex justify-content-between align-items-center">
        <span>Data Pembayaran</span>
        <small class="text-muted fw-normal"><?= $tanggalLengkap ?></small>
    </h3>

    <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

    <a href="<?= site_url('pembayaran/add') ?>" class="btn btn-success mb-3 rounded-pill shadow-sm px-4 py-2 d-inline-flex align-items-center">
        <i class="fas fa-plus me-2"></i> Tambah Pembayaran
    </a>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <div class="card shadow-sm w-100">
        <div class="card-body table-responsive p-3">
            <table id="tabel-pembayaran" class="table table-bordered table-striped table-hover nowrap" style="width:100%">
                <thead class="bg-light text-center">
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
                            <td class="text-center">
                                <?= $p->tanggal_pelunasan ? date('d-m-Y H:i', strtotime($p->tanggal_pelunasan)) : '-' ?>
                            </td>
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
                        <?php endforeach; ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
