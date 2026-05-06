<div class="content-wrapper px-4 pt-4">
  <?php
setlocale(LC_TIME, 'id_ID');
date_default_timezone_set('Asia/Jakarta');

$hariIndo = [
  'Sunday' => 'Minggu',
  'Monday' => 'Senin',
  'Tuesday' => 'Selasa',
  'Wednesday' => 'Rabu',
  'Thursday' => 'Kamis',
  'Friday' => 'Jumat',
  'Saturday' => 'Sabtu'
];

$bulanIndo = [
  'January' => 'Januari',
  'February' => 'Februari',
  'March' => 'Maret',
  'April' => 'April',
  'May' => 'Mei',
  'June' => 'Juni',
  'July' => 'Juli',
  'August' => 'Agustus',
  'September' => 'September',
  'October' => 'Oktober',
  'November' => 'November',
  'December' => 'Desember'
];

$hari = $hariIndo[date('l')];
$tanggal = date('d');
$bulan = $bulanIndo[date('F')];
$tahun = date('Y');
$tanggalLengkap = "$hari, $tanggal $bulan $tahun";
?>

<h3 class="text-dark fw-bold mb-4 d-flex justify-content-between align-items-center">
  <span>Data Dokter Pengirim</span>
  <small class="text-muted fw-normal"><?= $tanggalLengkap ?></small>
</h3>
<hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">
  <a href="<?= site_url('dokter_pengirim/add') ?>" class="btn btn-success mb-3 rounded-pill shadow-sm px-4 py-2 d-inline-flex align-items-center">
  <i class="fas fa-plus me-2"></i> Tambah Data
</a>
  <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $this->session->flashdata('success'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  <?php endif; ?>
  <div class="card shadow-sm w-100">
  <div class="card-body table-responsive p-3">
    <table id="tabel-dokter" class="table table-bordered table-striped table-hover nowrap" style="width:100%">
      <thead class="bg-light text-center">
        <tr>
          <th>No</th>
          <th>Nama Instansi / Dokter</th>
          <th>Alamat</th>
          <th>No. Telp</th>
          <th>Dibuat Pada</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($dokter_pengirim)): ?>
          <tr>
            <td colspan="6" class="text-center">Belum ada data dokter</td>
          </tr>
        <?php else: ?>
          <?php foreach ($dokter_pengirim as $i => $d): ?>
            <tr>
              <td class="text-center"><?= $i + 1 ?></td>
              <td><?= $d->nama ?></td>
              <td><?= $d->alamat ?></td>
              <td class="text-center"><?= $d->no_telp ?></td>
              <td class="text-center"><?= date('d-m-Y H:i', strtotime($d->created_at)) ?></td>
              <td class="text-center">
                <a href="<?= site_url('dokter_pengirim/edit/' . $d->id_dokter_pengirim) ?>" class="btn btn-sm btn-outline-success me-1" title="Edit">
                    <i class="fas fa-pen"></i>
                </a>
                <a href="<?= site_url('dokter_pengirim/delete/' . $d->id_dokter_pengirim) ?>" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Hapus data ini?')">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
