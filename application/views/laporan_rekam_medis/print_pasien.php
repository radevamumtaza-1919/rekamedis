<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; padding: 0; }
        .table-data { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table-data th, .table-data td { border: 1px solid #000; padding: 5px; text-align: left; }
        .table-data th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Klinik & Rekam Medis</h2>
        <p><?= $title ?></p>
    </div>

    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>No Register</th>
                <th>Nama Pasien</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Waktu Terdaftar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($pasien as $p): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p->no_register; ?></td>
                    <td><?= $p->nama_pasien; ?></td>
                    <td><?= $p->nik; ?></td>
                    <td><?= $p->gender; ?></td>
                    <td><?= $p->umur; ?> Tahun</td>
                    <td><?= date('H:i:s', strtotime($p->created_at ?? date('Y-m-d H:i:s'))); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
