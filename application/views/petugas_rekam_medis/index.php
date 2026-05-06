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
	$tanggalLengkap = "$hari, " . date('d') . " " . $bulanIndo[date('F')] . " " . date('Y');
	?>

	<h3 class="text-dark fw-bold mb-4 d-flex justify-content-between align-items-center">
		<span>DATA DOKTER PEMERIKSA (REKAM MEDIS)</span>
		<small class="text-muted fw-normal">
			<?= $tanggalLengkap ?>
		</small>
	</h3>
	<hr style="border-top: 2px solid #1e3a8a; margin-bottom: 20px;">

	<!-- Tampilkan Notifikasi Flashdata (Pesan Sukses/Gagal) -->
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<div class="mb-3">
		<a href="<?= site_url('petugas_dokter/create') ?>" class="btn btn-primary">
			<i class="fas fa-user-plus"></i> Tambah Data
		</a>
	</div>

	<div class="card shadow-sm w-100">
		<div class="card-body table-responsive p-3">
			<table id="tabel-dokter" class="table table-bordered table-striped table-hover nowrap"
				style="width:100%">
				<thead class="bg-light">
					<tr>
						<th width="5%">No</th>
						<th>Nama Dokter</th>
						<th>Spesialisasi</th>
						<th>No. SIP</th>
						<th width="15%" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($dokters)):
						$no = 1;
						foreach ($dokters as $d): ?>
							<tr>
								<td class="text-center">
									<?= $no++ ?>
								</td>
								<td>
									<?= htmlspecialchars($d->nama_dokter) ?>
								</td>
								<td>
									<?= htmlspecialchars($d->spesialisasi) ?>
								</td>
								<td>
									<?= htmlspecialchars($d->sip) ?>
								</td>
								<td class="text-center">
									<a href="<?= site_url('petugas_dokter/edit/' . $d->id_dokter) ?>"
										class="btn btn-sm btn-warning">
										<i class="fas fa-edit"></i> Edit
									</a>
									<a href="<?= site_url('petugas_dokter/delete/' . $d->id_dokter) ?>"
										class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">
										<i class="fas fa-trash"></i> Hapus
									</a>
								</td>
							</tr>
						<?php endforeach;
					endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>