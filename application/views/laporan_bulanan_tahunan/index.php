<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>
                <i class="fas fa-chart-bar"></i>
                Laporan Bulanan & Tahunan
            </h1>
            <a href="<?= site_url('form_laporan_akhir') ?>"
                class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- ================= HEMATOLOGI ================= -->
                <div class="col-md-6">

                    <div class="card card-danger shadow">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-tint"></i>
                                Daftar Pemeriksaan HEMATOLOGI
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- CHART -->
                            <div class="mb-4">
                                <canvas id="chartHematologi" height="120"></canvas>
                            </div>
                            <hr>
                            <!-- TABEL -->
                            <table class="table table-bordered table-striped">
                                <thead class="bg-danger">
                                    <tr>
                                        <th width="10">No</th>
                                        <th>Jenis Pemeriksaan</th>
                                        <th>Jumlah Pemeriksaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach($hematologi as $h): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $h->nama_jenis ?></td>
                                        <td>
                                            <span class="badge badge-danger">
                                                <?= $h->total ?> Pemeriksaan
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ================= KIMIA DARAH ================= -->
<div class="col-md-6">

    <div class="card card-success shadow">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-flask"></i>
                Daftar Pemeriksaan KIMIA DARAH
            </h3>
        </div>

        <div class="card-body">

            <div class="mb-4">
                <canvas id="chartKimiaDarah" height="120"></canvas>
            </div>

            <hr>

            <table class="table table-bordered table-striped">

                <thead class="bg-success">

                    <tr>
                        <th>No</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Jumlah Pemeriksaan</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($kimia_darah as $k): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $k->nama_jenis ?></td>

                        <td>
                            <span class="badge badge-success">
                                <?= $k->total ?> Pemeriksaan
                            </span>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ================= URINALISA ================= -->
<div class="col-md-6">

    <div class="card card-warning shadow">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-vial"></i>
                Daftar Pemeriksaan URINALISA
            </h3>
        </div>

        <div class="card-body">

            <div class="mb-4">
                <canvas id="chartUrinalisis" height="120"></canvas>
            </div>

            <hr>

            <table class="table table-bordered table-striped">

                <thead class="bg-warning">

                    <tr>
                        <th>No</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Jumlah Pemeriksaan</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($urinalisis as $u): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $u->nama_jenis ?></td>

                        <td>
                            <span class="badge badge-warning">
                                <?= $u->total ?> Pemeriksaan
                            </span>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ================= HEMOSTASIS ================= -->
<div class="col-md-6">

    <div class="card card-info shadow">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-heartbeat"></i>
                Daftar Pemeriksaan HEMOSTASIS
            </h3>
        </div>

        <div class="card-body">

            <div class="mb-4">
                <canvas id="chartHemostasis" height="120"></canvas>
            </div>

            <hr>

            <table class="table table-bordered table-striped">

                <thead class="bg-info">

                    <tr>
                        <th>No</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Jumlah Pemeriksaan</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($hemostasis as $h): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $h->nama_jenis ?></td>

                        <td>
                            <span class="badge badge-info">
                                <?= $h->total ?> Pemeriksaan
                            </span>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ================= BIOMOLEKULER ================= -->
<div class="col-md-6">

    <div class="card card-primary shadow">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-dna"></i>
                Daftar Pemeriksaan BIOMOLEKULER
            </h3>
        </div>

        <div class="card-body">

            <div class="mb-4">
                <canvas id="chartBiomolekuler" height="120"></canvas>
            </div>

            <hr>

            <table class="table table-bordered table-striped">

                <thead class="bg-primary">

                    <tr>
                        <th>No</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Jumlah Pemeriksaan</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($biomolekuler as $b): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $b->nama_jenis ?></td>

                        <td>
                            <span class="badge badge-primary">
                                <?= $b->total ?> Pemeriksaan
                            </span>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ================= IMUNOLOGI ================= -->
<div class="col-md-6">

    <div class="card card-secondary shadow">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-microscope"></i>
                Daftar Pemeriksaan IMUNOLOGI
            </h3>
        </div>

        <div class="card-body">

            <div class="mb-4">
                <canvas id="chartImunologi" height="120"></canvas>
            </div>

            <hr>

            <table class="table table-bordered table-striped">

                <thead class="bg-secondary">

                    <tr>
                        <th>No</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Jumlah Pemeriksaan</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($imunologi as $i): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $i->nama_jenis ?></td>

                        <td>
                            <span class="badge badge-secondary">
                                <?= $i->total ?> Pemeriksaan
                            </span>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ================= MIKROBIOLOGI ================= -->
<div class="col-md-6">

    <div class="card card-dark shadow">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-bacteria"></i>
                Daftar Pemeriksaan MIKROBIOLOGI
            </h3>
        </div>

        <div class="card-body">

            <div class="mb-4">
                <canvas id="chartMikrobiologi" height="120"></canvas>
            </div>

            <hr>

            <table class="table table-bordered table-striped">

                <thead class="bg-dark">

                    <tr>
                        <th>No</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Jumlah Pemeriksaan</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no = 1; ?>
                    <?php foreach($mikrobiologi as $m): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $m->nama_jenis ?></td>

                        <td>
                            <span class="badge badge-dark">
                                <?= $m->total ?> Pemeriksaan
                            </span>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

                <!-- ================= TOKSIKOLOGI ================= -->
                <div class="col-md-6">
                    <div class="card card-dark shadow">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bug"></i>
                                Daftar Pemeriksaan TOKSIKOLOGI
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- CHART -->
                            <div class="mb-4">
                                <canvas id="chartToksikologi" height="120"></canvas>
                            </div>
                            <hr>
                            <!-- TABEL -->
                            <table class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <tr>
                                        <th width="10">No</th>
                                        <th>Jenis Pemeriksaan</th>
                                        <th>Jumlah Pemeriksaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach($toksikologi as $t): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $t->nama_jenis ?></td>
                                        <td>
                                            <span class="badge badge-dark">
                                                <?= $t->total ?> Pemeriksaan
                                            </span>
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
<!-- ================= CHART JS ================= -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// ================= HEMATOLOGI =================
new Chart(document.getElementById('chartHematologi'), {

    type: 'bar',

    data: {

        labels: [
            <?php foreach($hematologi as $h): ?>
                "<?= $h->nama_jenis ?>",
            <?php endforeach; ?>
        ],

        datasets: [{

            label: 'Jumlah Pemeriksaan',

            data: [
                <?php foreach($hematologi as $h): ?>
                    <?= $h->total ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [
                '#dc3545',
                '#fd7e14',
                '#ffc107',
                '#28a745',
                '#17a2b8',
                '#6610f2',
                '#e83e8c'
            ],

            borderWidth: 1

        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

});


// ================= KIMIA DARAH =================
new Chart(document.getElementById('chartKimiaDarah'), {

    type: 'bar',

    data: {

        labels: [
            <?php foreach($kimia_darah as $k): ?>
                "<?= $k->nama_jenis ?>",
            <?php endforeach; ?>
        ],

        datasets: [{

            label: 'Jumlah Pemeriksaan',

            data: [
                <?php foreach($kimia_darah as $k): ?>
                    <?= $k->total ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [
                '#28a745',
                '#20c997',
                '#17a2b8',
                '#007bff',
                '#6610f2',
                '#6f42c1'
            ],

            borderWidth: 1

        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

});


// ================= URINALISA =================
new Chart(document.getElementById('chartUrinalisis'), {

    type: 'bar',

    data: {

        labels: [
            <?php foreach($urinalisis as $u): ?>
                "<?= $u->nama_jenis ?>",
            <?php endforeach; ?>
        ],

        datasets: [{

            label: 'Jumlah Pemeriksaan',

            data: [
                <?php foreach($urinalisis as $u): ?>
                    <?= $u->total ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [
                '#17a2b8',
                '#20c997',
                '#ffc107',
                '#fd7e14',
                '#dc3545'
            ],

            borderWidth: 1

        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

});


// ================= BIOMOLEKULER =================
new Chart(document.getElementById('chartBiomolekuler'), {

    type: 'bar',

    data: {

        labels: [
            <?php foreach($biomolekuler as $b): ?>
                "<?= $b->nama_jenis ?>",
            <?php endforeach; ?>
        ],

        datasets: [{

            label: 'Jumlah Pemeriksaan',

            data: [
                <?php foreach($biomolekuler as $b): ?>
                    <?= $b->total ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [
                '#ffc107',
                '#fd7e14',
                '#dc3545',
                '#6f42c1',
                '#007bff'
            ],

            borderWidth: 1

        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

});


// ================= HEMOSTASIS =================
new Chart(document.getElementById('chartHemostasis'), {

    type: 'bar',

    data: {

        labels: [
            <?php foreach($hemostasis as $h): ?>
                "<?= $h->nama_jenis ?>",
            <?php endforeach; ?>
        ],

        datasets: [{

            label: 'Jumlah Pemeriksaan',

            data: [
                <?php foreach($hemostasis as $h): ?>
                    <?= $h->total ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [
                '#17a2b8',
                '#007bff',
                '#6610f2',
                '#6f42c1',
                '#e83e8c'
            ],

            borderWidth: 1

        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

});


// ================= IMUNOLOGI =================
new Chart(document.getElementById('chartImunologi'), {

    type: 'bar',

    data: {

        labels: [
            <?php foreach($imunologi as $i): ?>
                "<?= $i->nama_jenis ?>",
            <?php endforeach; ?>
        ],

        datasets: [{

            label: 'Jumlah Pemeriksaan',

            data: [
                <?php foreach($imunologi as $i): ?>
                    <?= $i->total ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [
                '#6c757d',
                '#343a40',
                '#007bff',
                '#20c997',
                '#ffc107'
            ],

            borderWidth: 1

        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

});


// ================= MIKROBIOLOGI =================
new Chart(document.getElementById('chartMikrobiologi'), {

    type: 'bar',

    data: {

        labels: [
            <?php foreach($mikrobiologi as $m): ?>
                "<?= $m->nama_jenis ?>",
            <?php endforeach; ?>
        ],

        datasets: [{

            label: 'Jumlah Pemeriksaan',

            data: [
                <?php foreach($mikrobiologi as $m): ?>
                    <?= $m->total ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [
                '#dc3545',
                '#fd7e14',
                '#ffc107',
                '#28a745',
                '#17a2b8'
            ],

            borderWidth: 1

        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

});


// ================= TOKSIKOLOGI =================
new Chart(document.getElementById('chartToksikologi'), {

    type: 'bar',

    data: {

        labels: [
            <?php foreach($toksikologi as $t): ?>
                "<?= $t->nama_jenis ?>",
            <?php endforeach; ?>
        ],

        datasets: [{

            label: 'Jumlah Pemeriksaan',

            data: [
                <?php foreach($toksikologi as $t): ?>
                    <?= $t->total ?>,
                <?php endforeach; ?>
            ],

            backgroundColor: [
                '#343a40',
                '#6f42c1',
                '#007bff',
                '#20c997',
                '#ffc107',
                '#fd7e14',
                '#dc3545'
            ],

            borderWidth: 1

        }]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }

});

</script>