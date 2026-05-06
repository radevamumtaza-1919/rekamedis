<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Laporan Hasil Uji</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    font-size: 10pt;
    color: #000;
  }

  /* Warna kategori (lebih gelap) */
  .row-kategori {
      background: #d0d0d0 !important;
      font-weight: bold;
  }

  /* Warna subkategori (lebih terang) */
  .row-subkategori {
      background: #e8e8e8 !important;
      font-weight: bold;
  }


  /* ===== HEADER ===== */
  .header {
    border-bottom: 1.5px solid #000;
    margin-bottom: 8px;
    padding-bottom: 4px;
    position: relative;
  }

  .header-content {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
  }

  /* 🔹 Logo di kiri atas */
  .header-content img {
    position: absolute;
    left: 0;
    top: 0;
    width: 55px; /* ukuran kecil dan proporsional */
    height: auto;
  }

  .header-text {
    text-align: center;
    width: 100%;
  }

  .header-text h2, 
  .header-text h3, 
  .header-text p {
    margin: 0;
    line-height: 1.3;
  }

  .header-text h2 { font-size: 12pt; font-weight: bold; }
  .header-text h3 { font-size: 10pt; font-weight: bold; }
  .header-text p  { font-size: 9pt; }

  h3.title {
    text-align: center;
    font-weight: bold;
    font-size: 11pt;
    text-decoration: underline;
    margin: 8px 0;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 9pt;
    margin-bottom: 8px;
  }

  table, th, td {
    border: 1px solid #000;
    padding: 4px 6px;
  }

  th {
    background-color: #f2f2f2;
    text-align: center;
  }

  td {
    vertical-align: top;
  }

  .no-border, .no-border td {
    border: none !important;
  }

  .no-border td {
    padding: 2px 4px;
  }

  .sub-header {
    font-weight: bold;
    background: #fafafa;
  }

  .footer-table td {
    border: none;
    font-size: 9pt;
    vertical-align: top;
  }

  .footer-left {
    width: 60%;
  }

  .footer-right {
    width: 40%;
    text-align: center;
    padding-left: 60px;
  }
</style>
</head>
<body>

<!-- HEADER -->
<table style="width:100%; border-bottom:1.5px solid #000; margin-bottom:6px; padding-bottom:4px;">
  <tr>
    <!-- KIRI: LOGO -->
    <td style="width:100px; text-align:center; vertical-align:middle; border:none;">
      <img src="<?= base_url('assets/img/logolabkes.png') ?>" alt="Logo" style="width:100px; height:auto;">
    </td>

    <!-- TENGAH: TEKS HEADER (BENAR-BENAR DI TENGAH HALAMAN) -->
    <td style="text-align:center; vertical-align:middle; border:none;">
      <h2 style="margin:0; font-size:12pt; font-weight:bold;">PEMERINTAH KOTA PANGKALPINANG</h2>
      <h3 style="margin:0; font-size:10pt; font-weight:bold;">DINAS KESEHATAN</h3>
      <p style="margin:0; font-size:9pt;"><strong>UPTD LABORATORIUM KESEHATAN</strong></p>
      <p style="margin:0; font-size:8pt;">Jalan Delima Siam VI Girimaya Pangkal Pinang - Telp (0717) 9120759</p>
    </td>

    <!-- KANAN: KOTAK KOSONG UNTUK BALANCE -->
    <td style="width:100px; border:none;"></td>
  </tr>
</table>



<!-- Judul -->
<div style="text-align:center; font-weight:bold; font-size:10pt; text-decoration:underline; margin:6px 0 8px;">
  LAPORAN HASIL UJI
</div>



<!-- Data Pasien & Spesimen -->
<table class="no-border">
<tr>
  <td>No. Registrasi</td><td>:</td><td><?= $form->no_register ?? '-' ?></td>
  <td>Kondisi Spesimen</td><td>:</td><td><?= $form->kelayakan ?? '-' ?></td>
</tr>
<tr>
  <td>Nama</td><td>:</td><td><?= $form->nama_pasien ?? '-' ?></td>
  <td>Petugas Pengambil Spesimen</td><td>:</td><td><?= $pengambilan->petugas_pengambilan ?? '-' ?></td>
</tr>
<tr>
  <td>Jenis Kelamin</td><td>:</td><td><?= $form->gender ?? '-' ?></td>
  <td>Tgl/Jam Pengambilan</td><td>:</td><td><?= $pengambilan ? date('d-m-Y / H.i', strtotime($pengambilan->tgl_jam_pengambilan)) . ' WIB' : '-' ?></td>
</tr>
<tr>
  <td>Tanggal Lahir / Usia</td><td>:</td><td><?= ($form->tgl_lahir ? date('d-m-Y', strtotime($form->tgl_lahir)) : '-') . ' / ' . ($form->umur ?? '-') ?></td>
  <td>Tgl/Jam Pemeriksaan</td><td>:</td><td><?= $pengambilan ? date('d-m-Y / H.i', strtotime($pengambilan->tgl_jam_pemeriksaan)) . ' WIB' : '-' ?></td>
</tr>
<tr>
  <td>Dokter Pengirim</td><td>:</td><td><?= $form->nama_dokter ?? '-' ?></td>
  <td>Tgl/Jam Selesai Pemeriksaan</td><td>:</td><td><?= $pengambilan ? date('d-m-Y / H.i', strtotime($pengambilan->tgl_jam_selesai)) . ' WIB' : '-' ?></td>
</tr>
<tr>
  <td>Tanggal Pengiriman</td><td>:</td><td><?= $form->tgl_form ? date('d-m-Y', strtotime($form->tgl_form)) : '-' ?></td>
  <td>Tgl/Jam Pelaporan Hasil</td><td>:</td><td><?= $pengambilan ? date('d-m-Y / H.i', strtotime($pengambilan->tgl_jam_pelaporan)) . ' WIB' : '-' ?></td>
</tr>
</table>

  <!-- Tabel Hasil Pemeriksaan -->
  <table>
<thead>
<tr>
  <th width="5%">No</th>
  <th width="35%">Jenis Pemeriksaan</th>
  <th width="15%">Hasil</th>
  <th width="10%">Satuan</th>
  <th width="15%">Nilai Rujukan</th>
  <th width="20%">Metode Pemeriksaan</th>
</tr>
</thead>

<tbody>
<?php
$no = 1;
$kategori = '';
$sub = '';

foreach ($detail as $d):

  // === HEADER KATEGORI ===
  if ($kategori != $d->kategori):
      $kategori = $d->kategori;
      $sub = ''; // reset sub kategori setiap ganti kategori
?>
<tr class="row-kategori">
    <td colspan="6"><?= strtoupper($kategori) ?></td>
</tr>
<?php endif; ?>

<?php
  // === HEADER SUB KATEGORI ===
  if ($sub != $d->sub_kategori):
      $sub = $d->sub_kategori;
?>
<tr style="font-weight:bold; background:#f7f7f7;">
    <td colspan="6" style="padding-left:15px;"><?= strtoupper($sub) ?></td>
</tr>
<?php endif; ?>

<!-- DATA ITEM PEMERIKSAAN -->
<tr>
  <td style="text-align:center;"><?= $no++ ?></td>
  <td><?= $d->nama_jenis ?></td>
  <td style="text-align:center;"><?= $d->hasil ?? '-' ?></td>
  <td style="text-align:center;"><?= $d->satuan ?? '-' ?></td>
  <td style="text-align:center;"><?= $d->nilai_rujukan ?? '-' ?></td>
  <td style="text-align:center;"><?= $d->metode ?? '-' ?></td>
</tr>

<?php endforeach; ?>
</tbody>
</table>

<strong>*Note : <?= $pengambilan->note ?? 'Pemeriksaan dilakukan >2 jam setelah sampel diambil' ?></strong>
<table class="no-border footer-table" style="margin-top:40px;">
<tr>
  <td class="footer-left">
    Petugas : <strong><?= $pengambilan->petugas_hasil ?? '-' ?></strong> <br><br><br><br>
    Verifikator : <strong><?= $pengambilan->verifikator_hasil ?? '-' ?></strong>
  </td>
  <td class="footer-right"><br><br><br><br><br><br>
  Pangkalpinang, <?= date('d F Y') ?><br>
  Penanggung Jawab Teknis Laboratorium Klinik<br><br><br><br><br><br><br>
  <strong><?= $pengambilan->penanggung_jawab_teknis ?? '-' ?></strong><br>
  SIP <?= $pengambilan->sip_penanggung ?? '-' ?>
</td>
</tr>
</table>

</body>
</html>
