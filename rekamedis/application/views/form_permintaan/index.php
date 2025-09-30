<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Data Formulir Permintaan Pemeriksaan</h3>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('form_permintaan/create') ?>" class="btn btn-primary mb-3">+ Tambah Data</a>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>No. Register</th>
                        <th>Nama Pasien</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Nama Dokter</th>
                        <th>Tanggal Form</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($formulir)): ?>
                        <?php $no = 1; foreach ($formulir as $f): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $f->no_register ?></td>
                                <td><?= $f->nama_pasien ?></td>
                                <td><?= $f->nik ?></td>
                                <td><?= $f->gender ?></td>
                                <td><?= $f->nama_dokter ?></td>
                                <td><?= date('d-m-Y', strtotime($f->tgl_form)) ?></td>
                                <td>
                                    <a href="<?= site_url('form_permintaan/detail/' . $f->id) ?>" class="btn btn-sm btn-info">Lihat</a>
                                    <a href="<?= site_url('form_permintaan/cetak_pdf/' . $f->id) ?>" class="btn btn-sm btn-secondary" target="_blank">PDF</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data formulir.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
