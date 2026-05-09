<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

        <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-clinic-medical"></i> Daftar Identitas Pasien </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="tabel-laporan-klinik">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Hari, Tanggal</th>
                                        <th>Jumlah Pasien</th>
                                        <th>Jumlah Jenis Kelamin</th>
                                        <th style="width: 120px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($klinik as $kl): ?>
                                        <?php
                                        $ts = strtotime($kl->tanggal);
                                        $hari_en = date('l', $ts);
                                        $tanggal_indo = date('d-m-Y', $ts);
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= isset($hari_indo[$hari_en]) ? $hari_indo[$hari_en] : $hari_en ?>,
                                                <?= $tanggal_indo ?>
                                            </td>
                                            <td><span class="badge badge-success"
                                                    style="font-size: 14px;"><?= $kl->total_pasien ?> Pasien</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-info" title="Laki-laki"><i
                                                        class="fas fa-mars"></i> <?= $kl->total_l ?: 0 ?></span>
                                                <span class="badge badge-danger" title="Perempuan"><i
                                                        class="fas fa-venus"></i> <?= $kl->total_p ?: 0 ?></span>
                                            </td>
                                            <td>
                                                <a href="<?= site_url('laporan_rekam_medis/detail_pasien/' . $kl->tanggal) ?>"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <div class="row">
                <!-- Data Pendaftaran (Pasien Baru) -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-plus"></i> Daftar Pasien Rekam Medis </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="tabel-laporan-pendaftaran">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Hari, Tanggal</th>
                                        <th>Jumlah Pasien</th>
                                        <th style="width: 120px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($registrations as $reg): ?>
                                        <?php
                                        $ts = strtotime($reg->tanggal);
                                        $hari_en = date('l', $ts);
                                        $tanggal_indo = date('d-m-Y', $ts);
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= isset($hari_indo[$hari_en]) ? $hari_indo[$hari_en] : $hari_en ?>,
                                                <?= $tanggal_indo ?>
                                            </td>
                                            <td><span class="badge badge-success"
                                                    style="font-size: 14px;"><?= $reg->total_pasien ?> Pasien</span></td>
                                            <td>
                                                <a href="<?= site_url('laporan_rekam_medis/detail_pendaftaran/' . $reg->tanggal) ?>"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Data Kunjungan -->
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-hospital-user"></i> Kunjungan Rekam Medis</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="tabel-laporan-kunjungan">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Hari, Tanggal</th>
                                        <th>Jumlah Kunjungan</th>
                                        <th style="width: 120px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($visits as $vis): ?>
                                        <?php
                                        $ts = strtotime($vis->tanggal);
                                        $hari_en = date('l', $ts);
                                        $tanggal_indo = date('d-m-Y', $ts);
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= isset($hari_indo[$hari_en]) ? $hari_indo[$hari_en] : $hari_en ?>,
                                                <?= $tanggal_indo ?>
                                            </td>
                                            <td><span class="badge badge-primary"
                                                    style="font-size: 14px;"><?= $vis->total_kunjungan ?> Kunjungan</span>
                                            </td>
                                            <td>
                                                <a href="<?= site_url('laporan_rekam_medis/detail_kunjungan/' . $vis->tanggal) ?>"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Laporan Uji Laboratorium Klinik -->
                <div class="col-md-6">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-vial"></i> Laporan Uji Laboratorium Klinik</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="tabel-laporan-uji-klinik">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Hari, Tanggal</th>
                                        <th>Jumlah Pasien</th>
                                        <th style="width: 120px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($uji_klinik as $uk): ?>
                                        <?php
                                        $ts = strtotime($uk->tanggal);
                                        $hari_en = date('l', $ts);
                                        $tanggal_indo = date('d-m-Y', $ts);
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= isset($hari_indo[$hari_en]) ? $hari_indo[$hari_en] : $hari_en ?>,
                                                <?= $tanggal_indo ?>
                                            </td>
                                            <td><span class="badge badge-warning"
                                                    style="font-size: 14px;"><?= $uk->total_pasien ?> Pemeriksaan</span></td>
                                            <td>
                                                <a href="<?= site_url('laporan_rekam_medis/detail_uji_klinik/' . $uk->tanggal) ?>"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> Lihat Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- DataTables setup (assume standard config from theme) -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if ($.fn.DataTable) {
            $('#tabel-laporan-pendaftaran').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#tabel-laporan-kunjungan').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#tabel-laporan-klinik').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#tabel-laporan-uji-klinik').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        }
    });
</script>