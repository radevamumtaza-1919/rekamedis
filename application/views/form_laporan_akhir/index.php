<div class="content-wrapper">

    <!-- HEADER -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-chart-bar"></i>
                        Laporan Hasil Pemeriksaan Laboratorium Klinik
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

                                    <?php 
                                    $selected_tahun = $this->input->get('tahun') ?? date('Y');
                                    for($i = date('Y'); $i >= 2020; $i--): ?>

                                        <option value="<?= $i ?>" <?= ($i == $selected_tahun) ? 'selected' : '' ?>>
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
                                    formaction="<?= site_url('Laporan_hasil_pemeriksaan/laporan_tahunan') ?>"
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

                $icon = [
                    'fas fa-heartbeat',
                    'fas fa-stethoscope',
                    'fas fa-user-md',
                    'fas fa-microscope',
                    'fas fa-vials',
                    'fas fa-x-ray',
                    'fas fa-notes-medical',
                    'fas fa-hospital',
                    'fas fa-pills',
                    'fas fa-ambulance',
                    'fas fa-briefcase-medical',
                    'fas fa-book-medical'
                ];

                ?>

                <?php foreach($bulan as $key => $b): ?>

                <div class="col-md-3">

                    <div class="card card-<?= $warna[$key] ?> shadow-sm" style="border-radius: 15px; transition: transform 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">

                        <div class="card-header" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">

                            <h3 class="card-title font-weight-bold">

                                <i class="fas fa-calendar-alt mr-1"></i>
                                <?= $b ?>

                            </h3>

                        </div>

                        <div class="card-body text-center">

                            <div class="mb-4 mt-2">
                                <i class="<?= $icon[$key] ?> fa-3x text-<?= $warna[$key] ?>" style="opacity: 0.8;"></i>
                            </div>

                            <a href="<?= site_url('form_laporan_akhir/detail/'.($key+1).'/'.$this->input->get('tahun')) ?>"
    class="btn btn-<?= $warna[$key] ?> btn-block shadow-sm" style="border-radius: 10px;">

                                <i class="fas fa-eye mr-1"></i>
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