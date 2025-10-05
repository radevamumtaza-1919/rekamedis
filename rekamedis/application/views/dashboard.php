<div class="content-wrapper px-4 pt-4">
    <h1 class="fw-bold text-primary">Selamat Datang</h1>
    <p>Halo, <?= $this->session->userdata('nama') ?>. Anda login sebagai <strong><?= $this->session->userdata('role') ?></strong>.</p>

    <!-- Diagram Kunjungan Pasien -->
    <div class="mt-5">
        <h4 class="text-secondary">Grafik Kunjungan Pasien</h4>
        <canvas id="chartKunjungan" width="400" height="200"></canvas>
    </div>
</div>
