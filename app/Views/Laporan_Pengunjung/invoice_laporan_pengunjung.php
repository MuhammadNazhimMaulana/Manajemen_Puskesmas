<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>

    <title>Manajemen Puskesmas Online | Invoice Laporan Pengunjung</title>
</head>

<body>
    <div style="font-size: 64px; color: '#dddddd'; "><i>Invoice</i></div>
    <p>
        <i>Bonevian Manajemen Puskesmas</i><br>
        Bandung, Indonesia <br>
        048124848
    </p>
    <p>
        Pembuat : <?= $laporan->nama?><br>
        No. Laporan : <?= $laporan->id_laporan ?><br>
        Tanggal : <?= $laporan->created_at ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Tanggal Bergabung</strong></th>
            <th><strong>Tanggal Keluar</strong></th>
        </tr>
        <tr>
            <td><?= $laporan->tanggal_bergabung ?></td>
            <td><?= $laporan->tanggal_keluar ?></td>
        </tr>
    </table>

</body>

</html>