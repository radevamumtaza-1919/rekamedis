<!DOCTYPE html>
<html>
<head>
    <title>Laporan Ambil Sampel</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 14px;
            margin: 40px;
        }

        .kop-surat {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .logo {
            width: 130px;
            margin-right: 30px;
        }

        .text-header {
            flex: 1;
            text-align: center;
        }

        .text-header .instansi {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .text-header .alamat {
            font-size: 13px;
        }

        .garis-bawah {
            border-bottom: 3px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .data-table {
            width: 100%;
            border-spacing: 0;
            margin-bottom: 30px;
        }

        .data-table td {
            padding: 6px;
            vertical-align: top;
        }

        .label {
            width: 30%;
            font-weight: bold;
        }

        .separator {
            width: 2%;
        }

        .value {
            width: 68%;
        }

        .ttd {
            width: 100%;
            margin-top: 50px;
        }

        .ttd td {
            text-align: right;
            padding-top: 20px;
        }

        .ttd .nama {
            font-weight: bold;
            text-decoration: underline;
        }

        .ttd .jabatan {
            margin-bottom: 60px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="kop-surat">
        <img src="<?= FCPATH . 'assets/img/logolabkes.png' ?>" alt="Logo" class="logo">
        <div class="text-header">
            <div class="instansi">UPTD. LABORATORIUM KESEHATAN</div>
            <div class="instansi">KOTA PANGKAL PINANG</div>
            <div class="alamat">
                Jl. Delima Siam VI, Girimaya, Pangkal Pinang, Kep. Bangka Belitung<br>
                Telp: (0911) 0812121212 | Fax: (1190) 347356 | Email: labkespkp@gmail.com
            </div>
        </div>
    </div>

    <div class="garis-bawah"></div>

    <!-- Judul -->
    <div class="judul">Laporan Pengambilan Sampel</div>

    <!-- Informasi -->
    <table class="data-table">
        <tr>
            <td class="label">No. Register</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->no_register ?></td>
        </tr>
        <tr>
            <td class="label">Nama Pasien</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->nama_pasien ?></td>
        </tr>
        <tr>
            <td class="label">Jenis Sampel</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->jenis_sampel ?></td>
        </tr>
        <tr>
            <td class="label">Kelayakan</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->kelayakan ?></td>
        </tr>
        <?php if ($sampel->kelayakan === 'Tidak Layak'): ?>
        <tr>
            <td class="label">Alasan Tidak Layak</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->alasan_tidak_layak ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td class="label">Volume</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->volume ?></td>
        </tr>
        <tr>
            <td class="label">Lokasi Pengambilan</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->lokasi_pengambilan ?></td>
        </tr>
        <tr>
            <td class="label">Jam Pengambilan</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->jam_pengambilan ?></td>
        </tr>
        <tr>
            <td class="label">Tanggal Permintaan</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->tanggal_permintaan ? date('d-m-Y', strtotime($sampel->tanggal_permintaan)) : '-' ?></td>
        </tr>
        <tr>
            <td class="label">Informasi Tambahan</td>
            <td class="separator">:</td>
            <td class="value"><?= $sampel->informasi_tambahan ?></td>
        </tr>
    </table>

    <!-- Tanda Tangan -->
    <table class="ttd">
        <tr>
            <td>
                Pangkal Pinang, <?= date('d F Y') ?><br>
                Petugas Laboratorium,<br><br><br><br><br>
                <span class="nama">__________________________</span><br>
                <span class="jabatan">NIP: _____________________</span>
            </td>
        </tr>
    </table>

</body>
</html>
