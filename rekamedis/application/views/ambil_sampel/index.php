<div class="content-wrapper px-4 pt-4">
    <?php
    // Set tanggal dan hari dalam Bahasa Indonesia
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
        <span>Data Ambil Sampel</span>
        <small class="text-muted fw-normal"><?= $tanggalLengkap ?></small>
    </h3>

    <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

    <a href="<?= site_url('ambil_sampel/add') ?>" class="btn btn-success mb-3 rounded-pill shadow-sm px-4 py-2 d-inline-flex align-items-center">
        <i class="fas fa-plus me-2"></i> Tambah Data Sampel
    </a>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <div class="card shadow-sm w-100">
        <div class="card-body table-responsive p-3">
            <table id="tabel-ambil-sampel" class="table table-bordered table-striped table-hover nowrap" style="width:100%">
                <thead class="bg-light text-center">
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
                            <td colspan="13" class="text-center">Belum ada data sampel</td>
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
                                        <span class="badge bg-danger"><?= $s->kelayakan ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-success"><?= $s->kelayakan ?></span>
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
                                        <a href="<?= site_url('ambil_sampel/edit/' . $s->id_ambil_sampel) ?>" class="btn btn-sm btn-outline-success me-1" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="<?= site_url('ambil_sampel/delete/' . $s->id_ambil_sampel) ?>" class="btn btn-sm btn-outline-danger me-1" title="Hapus" onclick="return confirm('Hapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="<?= site_url('ambil_sampel/print/' . $s->id_ambil_sampel) ?>" target="_blank" class="btn btn-sm btn-outline-primary" title="Print">
                                            <i class="fas fa-print"></i>
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
