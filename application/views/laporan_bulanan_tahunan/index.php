<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-chart-bar"></i>
                        Laporan Bulanan & Tahunan
                    </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= site_url('form_laporan_akhir') ?>" class="btn btn-secondary shadow-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- WRAPPER TAB UNTUK SEMUA PEMERIKSAAN -->
            <div class="card card-outline card-primary shadow-sm rounded-lg">
                <div class="card-header p-2 bg-white">
                    <ul class="nav nav-pills flex-column flex-md-row" id="pemeriksaan-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#tab_hematologi" data-toggle="tab"><i class="fas fa-tint mr-1"></i> Hematologi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_kimia_darah" data-toggle="tab"><i class="fas fa-flask mr-1"></i> Kimia Darah</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_urinalisa" data-toggle="tab"><i class="fas fa-vial mr-1"></i> Urinalisa</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_hemostasis" data-toggle="tab"><i class="fas fa-heartbeat mr-1"></i> Hemostasis</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_biomolekuler" data-toggle="tab"><i class="fas fa-dna mr-1"></i> Biomolekuler</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_imunologi" data-toggle="tab"><i class="fas fa-microscope mr-1"></i> Imunologi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_mikrobiologi" data-toggle="tab"><i class="fas fa-bacteria mr-1"></i> Mikrobiologi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_toksikologi" data-toggle="tab"><i class="fas fa-bug mr-1"></i> Toksikologi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_jumlah_pasien" data-toggle="tab"><i class="fas fa-user mr-1"></i>Jumlah Pasien</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_puskesmas_wilayah" data-toggle="tab"><i class="fas fa-map-marker-alt mr-1"></i>Kunjungan per Wilayah</a></li>
                    </ul>
                </div>
                <div class="card-body bg-light">
                    <div class="tab-content">
                        <!-- TAB HEMATOLOGI -->
                        <div class="tab-pane active" id="tab_hematologi">
                            <h4 class="text-danger mb-4 font-weight-bold"><i class="fas fa-tint"></i> Grafik & Data Hematologi</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartHematologi"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-danger text-white">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($hematologi as $h): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $h->nama_jenis ?></td>
                                                            <td class="text-center"><span class="badge badge-danger px-3 py-2"><?= $h->total ?> Pemeriksaan</span></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB KIMIA DARAH -->
                        <div class="tab-pane" id="tab_kimia_darah">
                            <h4 class="text-success mb-4 font-weight-bold"><i class="fas fa-flask"></i> Grafik & Data Kimia Darah</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartKimiaDarah"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-success text-white">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($kimia_darah as $k): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $k->nama_jenis ?></td>
                                                            <td class="text-center"><span class="badge badge-success px-3 py-2"><?= $k->total ?> Pemeriksaan</span></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB URINALISA -->
                        <div class="tab-pane" id="tab_urinalisa">
                            <h4 class="text-warning mb-4 font-weight-bold"><i class="fas fa-vial"></i> Grafik & Data Urinalisa</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartUrinalisis"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-warning">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($urinalisis as $u): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $u->nama_jenis ?></td>
                                                            <td class="text-center"><span class="badge badge-warning px-3 py-2"><?= $u->total ?> Pemeriksaan</span></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB HEMOSTASIS -->
                        <div class="tab-pane" id="tab_hemostasis">
                            <h4 class="text-info mb-4 font-weight-bold"><i class="fas fa-heartbeat"></i> Grafik & Data Hemostasis</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartHemostasis"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-info text-white">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($hemostasis as $h): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $h->nama_jenis ?></td>
                                                            <td class="text-center"><span class="badge badge-info px-3 py-2"><?= $h->total ?> Pemeriksaan</span></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB BIOMOLEKULER -->
                        <div class="tab-pane" id="tab_biomolekuler">
                            <h4 class="text-primary mb-4 font-weight-bold"><i class="fas fa-dna"></i> Grafik & Data Biomolekuler</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartBiomolekuler"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-primary text-white">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($biomolekuler as $b): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $b->nama_jenis ?></td>
                                                            <td class="text-center"><span class="badge badge-primary px-3 py-2"><?= $b->total ?> Pemeriksaan</span></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB IMUNOLOGI -->
                        <div class="tab-pane" id="tab_imunologi">
                            <h4 class="text-secondary mb-4 font-weight-bold"><i class="fas fa-microscope"></i> Grafik & Data Imunologi</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartImunologi"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-secondary text-white">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($imunologi as $i): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $i->nama_jenis ?></td>
                                                            <td class="text-center"><span class="badge badge-secondary px-3 py-2"><?= $i->total ?> Pemeriksaan</span></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB MIKROBIOLOGI -->
                        <div class="tab-pane" id="tab_mikrobiologi">
                            <h4 class="text-dark mb-4 font-weight-bold"><i class="fas fa-bacteria"></i> Grafik & Data Mikrobiologi</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartMikrobiologi"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-dark text-white">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($mikrobiologi as $m): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $m->nama_jenis ?></td>
                                                            <td class="text-center"><span class="badge badge-dark px-3 py-2"><?= $m->total ?> Pemeriksaan</span></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB TOKSIKOLOGI -->
                        <div class="tab-pane" id="tab_toksikologi">
                            <h4 class="text-dark mb-4 font-weight-bold"><i class="fas fa-bug"></i> Grafik & Data Toksikologi</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartToksikologi"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-dark text-white">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Jenis Pemeriksaan</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; foreach($toksikologi as $t): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $t->nama_jenis ?></td>
                                                            <td class="text-center"><span class="badge badge-dark px-3 py-2"><?= $t->total ?> Pemeriksaan</span></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB JUMLAH PASIEN -->
                        <div class="tab-pane" id="tab_jumlah_pasien">
                            <h4 class="text-primary mb-4 font-weight-bold"><i class="fas fa-users"></i> Grafik & Data Jumlah Pasien</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartJumlahPasien"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover m-0">
                                                    <thead class="bg-primary text-white">
                                                        <tr>
                                                            <th width="10" class="text-center">No</th>
                                                            <th>Kategori Gender</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td>Laki-laki</td>
                                                            <td class="text-center"><span class="badge badge-primary px-3 py-2"><?= isset($jumlah_pasien) ? $jumlah_pasien->laki_laki : 0 ?> Pasien</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td>Perempuan</td>
                                                            <td class="text-center"><span class="badge badge-primary px-3 py-2"><?= isset($jumlah_pasien) ? $jumlah_pasien->perempuan : 0 ?> Pasien</span></td>
                                                        </tr>
                                                        <tr class="bg-light font-weight-bold">
                                                            <td class="text-center" colspan="2">TOTAL KESELURUHAN</td>
                                                            <td class="text-center"><span class="badge badge-success px-3 py-2"><?= isset($jumlah_pasien) ? $jumlah_pasien->total : 0 ?> Pasien</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB PUSKESMAS WILAYAH -->
                        <div class="tab-pane" id="tab_puskesmas_wilayah">
                            <h4 class="text-success mb-4 font-weight-bold"><i class="fas fa-map-marker-alt"></i> Grafik & Data Kunjungan per Wilayah</h4>
                            <div class="row">
                                <div class="col-lg-7 mb-4 mb-lg-0">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <div class="chart-container" style="position: relative; height:350px; width:100%">
                                                <canvas id="chartPuskesmasWilayah"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card shadow-sm border-0 h-100">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <?php
                                                $grouped_puskesmas = [];
                                                $total_semua = 0;
                                                foreach($puskesmas_wilayah as $p) {
                                                    $kecamatan = $p->kecamatan;
                                                    if(!isset($grouped_puskesmas[$kecamatan])) {
                                                        $grouped_puskesmas[$kecamatan] = [];
                                                    }
                                                    $grouped_puskesmas[$kecamatan][] = $p;
                                                    $total_semua += $p->total;
                                                }

                                                $nama_bulan = strtr(date('F', mktime(0, 0, 0, $bulan, 1)), ['January'=>'Januari','February'=>'Februari','March'=>'Maret','April'=>'April','May'=>'Mei','June'=>'Juni','July'=>'Juli','August'=>'Agustus','September'=>'September','October'=>'Oktober','November'=>'November','December'=>'Desember']);
                                                ?>
                                                <table class="table table-bordered table-hover m-0">
                                                    <thead class="bg-success text-white text-center">
                                                        <tr>
                                                            <th colspan="3" class="text-uppercase py-3" style="font-size: 16px;">
                                                                JUMLAH KUNJUNGAN PASIEN per KECAMATAN<br>
                                                                <small>BULAN <?= strtoupper($nama_bulan) ?> <?= $tahun ?></small>
                                                            </th>
                                                        </tr>
                                                        <tr class="bg-light text-dark">
                                                            <th style="width: 35%;">Kecamatan</th>
                                                            <th>Puskesmas Wilayah</th>
                                                            <th style="width: 25%;">Total Kunjungan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($grouped_puskesmas as $kec => $items): ?>
                                                            <?php $rowspan = count($items); ?>
                                                            <?php foreach($items as $index => $item): ?>
                                                                <tr>
                                                                    <?php if($index === 0): ?>
                                                                        <td rowspan="<?= $rowspan ?>" class="align-middle text-uppercase font-weight-bold bg-light"><?= $kec ?></td>
                                                                    <?php endif; ?>
                                                                    <td class="text-uppercase align-middle">
                                                                        <?= str_replace('PUSKESMAS', 'PKM.', $item->wilayah) ?>
                                                                    </td>
                                                                    <td class="text-center align-middle">
                                                                        <span class="badge badge-success px-3 py-2"><?= $item->total ?> Kunjungan</span>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                        <tr class="bg-light font-weight-bold text-uppercase">
                                                            <td colspan="2" class="text-right pr-4">Total Keseluruhan</td>
                                                            <td class="text-center">
                                                                <span class="badge badge-primary px-3 py-2"><?= $total_semua ?> Kunjungan</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Fungsi untuk inisialisasi chart agar reusable dan maintainable
    function initChart(canvasId, labels, data, bgColors) {
        return new Chart(document.getElementById(canvasId), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pemeriksaan',
                    data: data,
                    backgroundColor: bgColors,
                    borderWidth: 1,
                    borderRadius: 4, // memberikan sudut membulat pada bar chart
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Penting agar tinggi chart dapat dikontrol via CSS
                plugins: {
                    legend: { display: false }, // Menyembunyikan legend karena hanya ada 1 dataset
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return ' ' + context.parsed.y + ' Pemeriksaan';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    },
                    x: {
                        grid: { display: false } // Menyembunyikan grid garis vertikal agar lebih bersih
                    }
                }
            }
        });
    }

    // Colors Array (Premium look)
    const colors = [
        '#dc3545', '#fd7e14', '#ffc107', '#28a745', '#17a2b8', '#6610f2', '#e83e8c', '#20c997', '#6f42c1', '#007bff'
    ];

    // Initialize all charts using JSON safe output
    const dataHematologi = {
        labels: [<?php foreach($hematologi as $h) echo json_encode($h->nama_jenis).","; ?>],
        data: [<?php foreach($hematologi as $h) echo json_encode($h->total).","; ?>]
    };
    initChart('chartHematologi', dataHematologi.labels, dataHematologi.data, colors);

    const dataKimiaDarah = {
        labels: [<?php foreach($kimia_darah as $k) echo json_encode($k->nama_jenis).","; ?>],
        data: [<?php foreach($kimia_darah as $k) echo json_encode($k->total).","; ?>]
    };
    initChart('chartKimiaDarah', dataKimiaDarah.labels, dataKimiaDarah.data, colors);

    const dataUrinalisa = {
        labels: [<?php foreach($urinalisis as $u) echo json_encode($u->nama_jenis).","; ?>],
        data: [<?php foreach($urinalisis as $u) echo json_encode($u->total).","; ?>]
    };
    initChart('chartUrinalisis', dataUrinalisa.labels, dataUrinalisa.data, colors);

    const dataHemostasis = {
        labels: [<?php foreach($hemostasis as $h) echo json_encode($h->nama_jenis).","; ?>],
        data: [<?php foreach($hemostasis as $h) echo json_encode($h->total).","; ?>]
    };
    initChart('chartHemostasis', dataHemostasis.labels, dataHemostasis.data, colors);

    const dataBiomolekuler = {
        labels: [<?php foreach($biomolekuler as $b) echo json_encode($b->nama_jenis).","; ?>],
        data: [<?php foreach($biomolekuler as $b) echo json_encode($b->total).","; ?>]
    };
    initChart('chartBiomolekuler', dataBiomolekuler.labels, dataBiomolekuler.data, colors);

    const dataImunologi = {
        labels: [<?php foreach($imunologi as $i) echo json_encode($i->nama_jenis).","; ?>],
        data: [<?php foreach($imunologi as $i) echo json_encode($i->total).","; ?>]
    };
    initChart('chartImunologi', dataImunologi.labels, dataImunologi.data, colors);

    const dataMikrobiologi = {
        labels: [<?php foreach($mikrobiologi as $m) echo json_encode($m->nama_jenis).","; ?>],
        data: [<?php foreach($mikrobiologi as $m) echo json_encode($m->total).","; ?>]
    };
    initChart('chartMikrobiologi', dataMikrobiologi.labels, dataMikrobiologi.data, colors);

    const dataToksikologi = {
        labels: [<?php foreach($toksikologi as $t) echo json_encode($t->nama_jenis).","; ?>],
        data: [<?php foreach($toksikologi as $t) echo json_encode($t->total).","; ?>]
    };
    initChart('chartToksikologi', dataToksikologi.labels, dataToksikologi.data, colors);
    
    // Initialize chart Jumlah Pasien
    const dataJumlahPasien = {
        labels: ["Laki-laki", "Perempuan"],
        data: [
            <?= isset($jumlah_pasien) ? $jumlah_pasien->laki_laki : 0 ?>, 
            <?= isset($jumlah_pasien) ? $jumlah_pasien->perempuan : 0 ?>
        ]
    };
    // Menggunakan warna khusus: biru untuk Laki-laki, pink untuk Perempuan
    initChart('chartJumlahPasien', dataJumlahPasien.labels, dataJumlahPasien.data, ['#007bff', '#e83e8c']);
    
    // Initialize chart Puskesmas Wilayah
    const dataPuskesmas = {
        labels: [<?php foreach($puskesmas_wilayah as $p) echo json_encode($p->wilayah).","; ?>],
        data: [<?php foreach($puskesmas_wilayah as $p) echo json_encode($p->total).","; ?>]
    };
    initChart('chartPuskesmasWilayah', dataPuskesmas.labels, dataPuskesmas.data, colors);

    // Memicu event resize pada window setiap kali tab dibuka agar grafik Chart.js 
    // beradaptasi ulang dengan ukuran div tersembunyi yang baru menjadi terlihat.
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        window.dispatchEvent(new Event('resize'));
    });
});
</script>