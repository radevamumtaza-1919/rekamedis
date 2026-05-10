<div class="content-wrapper px-4 pt-4">
  <h4 class="fw-bold text-center mb-4 text-uppercase">Laporan Hasil Uji Laboratorium</h4>

  <!-- Button Back -->
    <a href="<?= site_url('laporan_uji_klinik/index') ?>" class="btn btn-secondary px-4">
      <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pasien
    </a>


  <!-- Card Identitas Pasien & Spesimen -->
  <div class="card shadow mb-4 border border-dark">
    <div class="card-header bg-secondary text-white fw-bold text-center fs-5 py-2">
      IDENTITAS PASIEN & SPESIMEN
    </div>
    <div class="card-body bg-white">

  <?php
    $pengambilan = $this->db->select('pk.*, ps.nama_petugas')
                        ->from('form_pengambilan_klinik pk')
                        ->join('petugas_sampel_klinik ps', 'pk.id_petugas = ps.id_petugas', 'left')
                        ->where('pk.id_form', $id_form)
                        ->get()
                        ->row();
    $data['pengambilan'] = $pengambilan;
  ?>

<table class="table table-borderless table-sm mb-0" style="font-size: 14px;">
  <tr>
    <td width="20%" class="fw-semibold text-secondary">No. Registrasi</td>
    <td width="2%">:</td>
    <td width="30%"><?= $form->no_register ?? '-' ?></td>
    <td width="18%" class="fw-semibold text-secondary">Kondisi Spesimen</td>
    <td width="2%">:</td>
    <td><?= $form->kelayakan ?? '-' ?></td>
  </tr>
  <tr>
    <td class="fw-semibold text-secondary">Nama</td>
    <td>:</td>
    <td><?= $form->nama_pasien ?? '-' ?></td>
    <td class="fw-semibold text-secondary">Petugas Pengambil Spesimen</td>
    <td>:</td>
    <td><?= $pengambilan->nama_petugas ?? $pengambilan->petugas_pengambilan ?? '-' ?></td>
  </tr>
  <tr>
    <td class="fw-semibold text-secondary">Jenis Kelamin</td>
    <td>:</td>
    <td><?= $form->gender ?? '-' ?></td>
    <td class="fw-semibold text-secondary">Tgl/Jam Pengambilan Spesimen</td>
    <td>:</td>
    <td><?= $pengambilan ? date('d-m-Y / H.i', strtotime($pengambilan->tgl_jam_pengambilan)) . ' WIB' : '-' ?></td>
  </tr>
  <tr>
    <td class="fw-semibold text-secondary">Tanggal Lahir / Usia</td>
    <td>:</td>
    <td><?= ($form->tgl_lahir ? date('d-m-Y', strtotime($form->tgl_lahir)) : '-') 
              . ' / ' . ($form->umur ?? '-') ?></td>
    <td class="fw-semibold text-secondary">Tgl/Jam Pemeriksaan</td>
    <td>:</td>
    <td><?= $pengambilan ? date('d-m-Y / H.i', strtotime($pengambilan->tgl_jam_pemeriksaan)) . ' WIB' : '-' ?></td>
  </tr>
  <tr>
    <td class="fw-semibold text-secondary">Dokter Pengirim</td>
    <td>:</td>
    <td><?= $form->nama_dokter ?? '-' ?></td>
    <td class="fw-semibold text-secondary">Tgl/Jam Selesai Pemeriksaan</td>
    <td>:</td>
    <td><?= $pengambilan ? date('d-m-Y / H.i', strtotime($pengambilan->tgl_jam_selesai)) . ' WIB' : '-' ?></td>
  </tr>
  <tr>
    <td class="fw-semibold text-secondary">Tanggal Pengiriman</td>
    <td>:</td>
    <td><?= $form->tgl_form ? date('d-m-Y', strtotime($form->tgl_form)) : '-' ?></td>
    <td class="fw-semibold text-secondary">Tgl/Jam Pelaporan Hasil</td>
    <td>:</td>
    <td><?= $pengambilan ? date('d-m-Y / H.i', strtotime($pengambilan->tgl_jam_pelaporan)) . ' WIB' : '-' ?></td>
  </tr>
</table>
    </div>
  </div>
  <!-- Card Hasil Pemeriksaan -->
<div class="card shadow border border-dark mb-4">
  <div class="card-header bg-secondary text-white fw-bold text-center fs-5 py-2">
    HASIL PEMERIKSAAN
  </div>
  <div class="card-body bg-white">
  <table class="table table-bordered table-striped table-sm align-middle">
    <thead class="table-secondary text-center">
      <tr>
        <th width="5%">No</th>
        <th width="30%">Jenis Pemeriksaan</th>
        <th width="15%">Hasil</th>
        <th width="20%">Nilai Rujukan</th>
        <th width="10%">Satuan</th>
        <th width="20%">Metode</th>
      </tr>
    </thead>
    <tbody>

      <?php if (!empty($detail)): ?>
        <?php
          $no = 1;
          $kategori = '';
          $sub = '';
        ?>

        <?php foreach ($detail as $d): ?>

          <!-- === HEADER KATEGORI === -->
          <?php if ($kategori != $d->kategori): ?>
            <?php $kategori = $d->kategori; $sub = ''; ?>
            <tr class="table-primary">
              <td colspan="6" class="fw-bold text-uppercase">
                <?= strtoupper($kategori) ?>
              </td>
            </tr>
          <?php endif; ?>

          <!-- === HEADER SUBKATEGORI === -->
          <?php if ($sub != $d->sub_kategori): ?>
            <?php $sub = $d->sub_kategori; ?>
            <tr class="table-info">
              <td colspan="6" class="fw-bold text-uppercase ps-4">
                <?= strtoupper($sub) ?>
              </td>
            </tr>
          <?php endif; ?>

          <!-- === DATA ITEM PEMERIKSAAN === -->
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $d->nama_jenis ?></td>
            <td class="text-center"><?= $d->hasil ?? '-' ?></td>
            <td class="text-center"><?= $d->nilai_rujukan ?? '-' ?></td>
            <td class="text-center"><?= $d->satuan ?? '-' ?></td>
            <td class="text-center"><?= $d->metode ?? '-' ?></td>
          </tr>

        <?php endforeach; ?>

      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center text-muted">Belum ada hasil pemeriksaan.</td>
        </tr>
      <?php endif; ?>

    </tbody>
  </table>
</div>

</div>
<!-- Card Catatan & Petugas Laboratorium -->
<div class="card shadow border border-dark mb-4">
  <div class="card-header bg-secondary text-white fw-bold text-center fs-5 py-2">
    CATATAN & PETUGAS LABORATORIUM
  </div>
  <div class="card-body bg-white fs-6">
    <table class="table table-borderless table-sm mb-0" style="font-size: 14px;">
      <tr>
        <td width="20%" class="fw-semibold text-secondary">Catatan / Note</td>
        <td width="2%">:</td>
        <td><?= $pengambilan->note ?? '-' ?></td>
      </tr>
      <tr>
        <td class="fw-semibold text-secondary">Petugas Hasil</td>
        <td>:</td>
        <td><?= $pengambilan->petugas_hasil ?? '-' ?></td>
      </tr>
      <tr>
        <td class="fw-semibold text-secondary">Verifikator</td>
        <td>:</td>
        <td><?= $pengambilan->verifikator_hasil ?? '-' ?></td>
      </tr>
      <tr>
        <td class="fw-semibold text-secondary">Penanggung Jawab Teknis</td>
        <td>:</td>
        <td>
          <?= $pengambilan->penanggung_jawab_teknis ?? '-' ?><br>
          <small class="text-muted">SIP: <?= $pengambilan->sip_penanggung ?? '-' ?></small>
        </td>
      </tr>
    </table>
  </div>
</div>
  <div class="text-end mb-5">
      <a href="<?= site_url('laporan_uji_klinik') ?>" class="btn btn-secondary px-4">Kembali</a>
      <a href="<?= site_url('laporan_uji_klinik/export_pdf/' . $form->id) ?>" class="btn btn-danger px-4" target="_blank">Cetak PDF</a>
    </div>
