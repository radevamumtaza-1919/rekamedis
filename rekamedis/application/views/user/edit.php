<div class="container mt-4">
    <h3 class="fw-bold text-primary mb-4">Edit User</h3>
    <form action="<?= site_url('user/update/' . $user->id_user) ?>" method="post">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= $user->username ?>" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select" required>
                <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="dokter" <?= $user->role == 'dokter' ? 'selected' : '' ?>>Dokter</option>
                <option value="petugas" <?= $user->role == 'petugas' ? 'selected' : '' ?>>Petugas</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Password Baru (kosongkan jika tidak ingin diganti)</label>
            <input type="password" name="password" class="form-control" placeholder="Isi jika ingin ganti password">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('user') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
