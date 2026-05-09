<div class="content-wrapper">

    <!-- HEADER -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-chart-bar"></i>
                        Laporan Bulanan dan Tahunan
                    </h1>
                </div>

            </div>

        </div>
    </section>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">

            <!-- FILTER TAHUN -->
            <div class="card card-primary shadow">

                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-filter"></i>
                        Filter Tahun Laporan
                    </h3>
                </div>

                <div class="card-body">

                    <form method="GET" action="">

                        <div class="row">

                            <div class="col-md-4">

                                <label>Pilih Tahun</label>

                                <select name="tahun" class="form-control">

                                    <?php for($i = date('Y'); $i >= 2020; $i--): ?>

                                        <option value="<?= $i ?>">
                                            <?= $i ?>
                                        </option>

                                    <?php endfor; ?>

                                </select>

                            </div>

                            <div class="col-md-2 d-flex align-items-end">

                                <button type="submit"
                                    class="btn btn-primary btn-block">

                                    <i class="fas fa-search"></i>
                                    Tampilkan

                                </button>

                            </div>

                            <!-- BUTTON LAPORAN TAHUNAN -->
                            <div class="col-md-3 d-flex align-items-end">

                                <button type="submit"
                                    formaction="<?= site_url('laporan_bulanan_tahunan/laporan_tahunan') ?>"
                                    class="btn btn-success btn-block">

                                    <i class="fas fa-chart-line"></i>
                                    Laporan Tahunan

                                </button>

                            </div>
                        </div>

                    </form>

                </div>

            </div>

            <!-- CARD BULAN -->
            <div class="row">

                <?php

                $bulan = [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ];

                $warna = [
                    'primary',
                    'success',
                    'warning',
                    'danger',
                    'info',
                    'secondary',
                    'dark',
                    'primary',
                    'success',
                    'warning',
                    'danger',
                    'info'
                ];

                ?>

                <?php foreach($bulan as $key => $b): ?>

                <div class="col-md-3">

                    <div class="card card-<?= $warna[$key] ?> shadow">

                        <div class="card-header">

                            <h3 class="card-title">

                                <i class="fas fa-calendar-alt"></i>
                                <?= $b ?>

                            </h3>

                        </div>

                        <div class="card-body text-center">

                            <h2 class="mb-3">
                                <i class="fas fa-file-medical"></i>
                            </h2>

                            <a href="<?= site_url('form_laporan_akhir/detail/'.($key+1).'/'.$this->input->get('tahun')) ?>"
    class="btn btn-<?= $warna[$key] ?> btn-block">

                                <i class="fas fa-eye"></i>
                                Lihat Laporan

                            </a>

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

</div>