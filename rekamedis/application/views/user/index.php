<div class="container mt-4">
    <h3 class="text-primary fw-bold mb-4">Data User</h3>

    <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

    <div class="mb-3">
        <a href="<?= site_url('user/create') ?>" class="btn btn-primary">Tambah User</a>
    </div>

    <div class="table-responsive w-100">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data user</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($users as $i => $u): ?>
                        <tr>
                            <td class="text-center"><?= $i+1 ?></td>
                            <td><?= $u->username ?></td>
                            <td><?= $u->nama ?></td>
                            <td class="text-center"><?= ucfirst($u->role) ?></td>
                            <td class="text-center"><?= date('d-m-Y H:i', strtotime($u->created_at)) ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="<?= site_url('user/edit/'.$u->id_user) ?>" class="btn btn-light btn-sm" title="Edit">
                                        <i class="fas fa-edit text-warning"></i>
                                    </a>
                                    <a href="<?= site_url('user/delete/'.$u->id_user) ?>" class="btn btn-light btn-sm" title="Hapus" onclick="return confirm('Hapus user ini?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<style>
    .table thead th {
        text-align: center;
        vertical-align: middle;
    }

    .table td, .table th {
        vertical-align: middle;
        font-size: 14px;
    }

    .btn-warning {
        color: #fff;
    }

    .btn-danger {
        color: #fff;
    }

    .btn-warning:hover {
        background-color: #ffc107;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }
</style>
