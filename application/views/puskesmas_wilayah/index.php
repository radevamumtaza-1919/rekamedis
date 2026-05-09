<div class="content-wrapper px-4 pt-4">
  <?php
  setlocale(LC_TIME, 'id_ID');
  date_default_timezone_set('Asia/Jakarta');
  $hariIndo = ['Sunday'=>'Minggu','Monday'=>'Senin','Tuesday'=>'Selasa','Wednesday'=>'Rabu','Thursday'=>'Kamis','Friday'=>'Jumat','Saturday'=>'Sabtu'];
  $bulanIndo = ['January'=>'Januari','February'=>'Februari','March'=>'Maret','April'=>'April','May'=>'Mei','June'=>'Juni','July'=>'Juli','August'=>'Agustus','September'=>'September','October'=>'Oktober','November'=>'November','December'=>'Desember'];
  $hari = $hariIndo[date('l')];
  $tanggalLengkap = "$hari, ".date('d')." ".$bulanIndo[date('F')]." ".date('Y');
  ?>
  
  <h3 class="text-dark fw-bold mb-4 d-flex justify-content-between align-items-center">
    <span class="text-uppercase"><?= $title ?></span>
    <small class="text-muted fw-normal" style="font-size: 14px;"><?= $tanggalLengkap ?></small>
  </h3>
  <hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

  <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php endif; ?>

  <div class="mb-3">
    <a href="<?= site_url('puskesmas_wilayah/create') ?>" class="btn btn-primary">
      <i class="fas fa-plus"></i> Tambah Data
    </a>
  </div>

  <div class="card shadow-sm w-100">
    <div class="card-body table-responsive p-3">
        <table class="table table-bordered table-striped table-hover nowrap" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Nama Puskesmas</th>
                            <th width="20%">Kecamatan</th>
                            <th width="35%">Kelurahan (Wilayah Kerja)</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($wilayah as $w): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $w->nama_puskesmas ?></td>
                            <td><?= $w->kecamatan ?></td>
                            <td><?= $w->kelurahan_list ?></td>
                            <td>
                                <a href="<?= site_url('puskesmas_wilayah/edit/'.$w->id) ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?= site_url('puskesmas_wilayah/delete/'.$w->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
