<div class="content-wrapper px-4 pt-4">
    <?php
    setlocale(LC_TIME, 'id_ID');
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
        <span>Data Pasien</span>
        <small class="text-muted fw-normal"><?= $tanggalLengkap ?></small>
    </h3>
    <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

    <a href="<?= site_url('pasien/create') ?>" class="btn btn-success mb-3 rounded-pill shadow-sm px-4 py-2 d-inline-flex align-items-center">
        <i class="fas fa-plus me-2"></i> Tambah Pasien
    </a>
    <div class="card shadow-sm w-100">
        <div class="card-body table-responsive p-3">
            <table id="tabel-pasien" class="table table-bordered table-striped table-hover nowrap" style="width:100%">
                <thead class="bg-light text-center">
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
                            <td colspan="11" class="text-center">Belum ada data pasien</td>
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
                                        <a href="<?= site_url('pasien/show/' . $p->id_pasien) ?>" class="btn btn-sm btn-outline-primary me-1" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= site_url('pasien/edit/' . $p->id_pasien) ?>" class="btn btn-sm btn-outline-success me-1" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="<?= site_url('pasien/delete/' . $p->id_pasien) ?>" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Hapus data pasien ini?')">
                                            <i class="fas fa-trash"></i>
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
</div>
