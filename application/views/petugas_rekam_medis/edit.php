<div class="content-wrapper px-4 pt-4">
    <h3 class="text-dark fw-bold mb-4">EDIT DATA DOKTER PEMERIKSA</h3>
    <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

    <div class="card shadow-sm w-100">
        <div class="card-body p-4">
            <form action="<?= site_url('petugas_dokter/update/' . $dokter->id_dokter) ?>" method="post">
                <div class="mb-3">
                    <label for="nama_dokter" class="form-label">Nama Dokter</label>
                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= htmlspecialchars($dokter->nama_dokter) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="spesialisasi" class="form-label">Spesialisasi</label>
                    <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?= htmlspecialchars($dokter->spesialisasi) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="sip" class="form-label">No. SIP</label>
                    <input type="text" class="form-control" id="sip" name="sip" value="<?= htmlspecialchars($dokter->sip) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                <a href="<?= site_url('petugas_dokter') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
