<div class="container mt-4">
    <h1 class="fw-bold text-primary">Selamat Datang</h1>
    <p>Halo, <?= $this->session->userdata('nama') ?>. Anda login sebagai <strong><?= $this->session->userdata('role') ?></strong>.</p>
</div>
