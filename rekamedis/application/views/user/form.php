<div class="container mt-4">
    <h3 class="fw-bold text-primary mb-4">Tambah User</h3>
    <form action="<?= site_url('user/create') ?>" method="post">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select" required>
                <option value="admin">Admin</option>
                <option value="dokter">Dokter</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('user') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
