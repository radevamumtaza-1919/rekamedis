<div class="content-wrapper px-4 pt-4">
    <h3 class="text-center fw-bold mb-4">FORMULIR PENDAFTARAN PASIEN REKAM MEDIS</h3>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form
        action="<?= isset($pasien) ? site_url('form_permintaan_rm/update/' . $pasien->nik) : site_url('form_permintaan_rm/store') ?>"
        method="post">

        <!-- Baris atas dengan 2 card sejajar -->
        <div class="row justify-content-center mb-4">   
            <!-- Card Identitas Pasien -->
            <div class="col-md-6 d-flex">
                <div class="card border border-dark shadow-lg w-100 h-100 bg-white">
                    <div class="card-header bg-secondary text-white fw-bold mb-0" style="font-weight: 800">
                        Identitas Utama Pasien
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>No. Rekam Medis (RM) <span class="text-danger">*</span></label>
                            <input type="text" name="no_rm" class="form-control"
                                value="<?= isset($pasien->no_rm) ? $pasien->no_rm : (isset($no_rm) ? $no_rm : '') ?>"
                                placeholder="Contoh: RM-0001">
                        </div>
                        <div class="mb-3">
                            <label>Nomor Induk Kependudukan (NIK) <span class="text-danger">*</span> <small
                                    class="text-muted">(Ketik untuk cari data lama)</small></label>
                            <input type="text" name="nik" id="nik" class="form-control"
                                value="<?= isset($pasien->nik) ? $pasien->nik : '' ?>" required pattern="[0-9]+"
                                title="NIK hanya boleh berisi angka (numerik)"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>
                        <div class="mb-3">
                            <label>Nama Lengkap Pasien <span class="text-danger">*</span></label>
                            <input type="text" name="nama_pasien" class="form-control"
                                value="<?= isset($pasien->nama_pasien) ? $pasien->nama_pasien : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                value="<?= isset($pasien->tgl_lahir) ? $pasien->tgl_lahir : '' ?>"
                                onchange="hitungUmur()">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Umur (Tahun)</label>
                                <input type="number" name="umur" id="umur" class="form-control"
                                    value="<?= isset($pasien->umur) ? $pasien->umur : '' ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Informasi Tambahan -->
            <div class="col-md-6 d-flex">
                <div class="card border border-dark shadow-lg w-100 h-100 bg-white">
                    <div class="card-header bg-secondary text-white fw-bold mb-0" style="font-weight: 800">
                        Informasi Tambahan & Kontak
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Alamat_Lengkap</label>
                            <textarea name="alamat" class="form-control"
                                rows="3"><?= isset($pasien->alamat) ? $pasien->alamat : '' ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label>No. Telepon / HP</label>
                            <input type="text" name="no_telp" class="form-control"
                                value="<?= isset($pasien->no_telp) ? $pasien->no_telp : '' ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Agama</label>
                                <select name="agama" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agm): ?>
                                        <option value="<?= $agm ?>" <?= isset($pasien->agama) && $pasien->agama == $agm ? 'selected' : '' ?>><?= $agm ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status Pernikahan</label>
                                <select name="status_nikah" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach (['Belum Menikah', 'Menikah', 'Cerai Hidup', 'Cerai Mati'] as $sts): ?>
                                        <option value="<?= $sts ?>" <?= isset($pasien->status_nikah) && $pasien->status_nikah == $sts ? 'selected' : '' ?>><?= $sts ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki" <?= isset($pasien->gender) && $pasien->gender == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= isset($pasien->gender) && $pasien->gender == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Pendidikan</label>
                                <select name="pendidikan" class="form-select">
                                    <option value="">-- Pilih Pendidikan --</option>
                                    <?php foreach (['Tidak Sekolah', 'SD', 'SLTP', 'SLTA', 'D1/D2/D3', 'D4/S1', 'S2', 'S3'] as $pend): ?>
                                        <option value="<?= $pend ?>" <?= isset($pasien->pendidikan) && $pasien->pendidikan == $pend ? 'selected' : '' ?>><?= $pend ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control"
                                    value="<?= isset($pasien->pekerjaan) ? $pasien->pekerjaan : '' ?>">
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold text-primary">Petugas Pendaftaran <span class="text-danger">*</span></label>
                                <select name="petugas_pendaftaran" id="petugas_pendaftaran" class="form-select" required>
                                    <option value="">-- Pilih Petugas Pendaftaran --</option>
                                    <?php if(isset($daftar_petugas)): foreach ($daftar_petugas as $pt): ?>
                                      <option value="<?= $pt->nama_petugas ?>"
                                        <?= isset($pasien->petugas_pendaftaran) && $pasien->petugas_pendaftaran == $pt->nama_petugas ? 'selected' : '' ?>>
                                        <?= $pt->nama_petugas ?><?= $pt->jabatan ? " ({$pt->jabatan})" : "" ?>
                                      </option>
                                    <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>

        <div class="row mb-5">
            <div class="col-12 text-center">
                <a href="<?= site_url('form_permintaan_rm') ?>" class="btn btn-secondary px-5 py-2">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary px-5 py-2 ms-2">
                    <i class="fas fa-save me-2"></i> <?= isset($pasien) ? 'Update Data' : 'Simpan Data' ?>
                </button>
            </div>
        </div>

    </form>
</div>

<script>
    function hitungUmur() {
        var tanggalLahir = document.getElementById('tgl_lahir').value;
        if (tanggalLahir) {
            var today = new Date();
            var birthDate = new Date(tanggalLahir);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('umur').value = age;
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        var nikInput = document.getElementById('nik');
        if (nikInput) {
            nikInput.addEventListener('blur', function () {
                var nik = this.value;
                if (nik.length >= 5) {
                    // Cek jika menambah data baru (tidak ada id pasien di form update)
                    <?php if (!isset($pasien)): ?>
                        fetch("<?= site_url('form_permintaan_rm/cari_pasien') ?>", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'nik=' + nik
                        })
                            .then(response => response.json())
                            .then(res => {
                                if (res.status === 'success') {
                                    var p = res.data;
                                    document.querySelector('input[name="nama_pasien"]').value = p.nama_pasien || '';
                                    document.querySelector('input[name="tgl_lahir"]').value = p.tgl_lahir || '';
                                    document.querySelector('input[name="umur"]').value = p.umur || '';
                                    document.querySelector('select[name="gender"]').value = p.gender || '';
                                    document.querySelector('textarea[name="alamat"]').value = p.alamat || '';
                                    document.querySelector('input[name="no_telp"]').value = p.no_telp || '';
                                    document.querySelector('select[name="agama"]').value = p.agama || '';
                                    document.querySelector('select[name="status_nikah"]').value = p.status_nikah || '';
                                    document.querySelector('select[name="pendidikan"]').value = p.pendidikan || '';
                                    document.querySelector('input[name="pekerjaan"]').value = p.pekerjaan || '';

                                    // Pertahankan no_rm lama pasien
                                    // if (p.no_rm) {
                                    //     document.querySelector('input[name="no_rm"]').value = p.no_rm;
                                    //     document.querySelector('input[name="no_rm"]').setAttribute('readonly', 'readonly');
                                    // }

                                    // Optional: Memberi feedback ke user
                                    alert('Data Pasien Lama Ditemukan. Formulir otomatis diisi.');
                                }
                            })
                            .catch(e => console.log('Error cari pasien', e));
                    <?php endif; ?>
                }
            });
        }
    });
</script>