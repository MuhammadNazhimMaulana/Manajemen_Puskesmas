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

    <title>Manajemen Puskesmas Online | Invoice Pembelian Obat User</title>
</head>

<body>
    <div style="font-size: 64px; color: '#dddddd'; "><i>Invoice</i></div>
    <p>
        <i>Bonevian Manajemen Puskesmas</i><br>
        Bandung, Indonesia <br>
        048124848
    </p>
    <p>
        Peminjam : <?= $pembelian->firstname?><br>
        Alamat : <?= $pembelian->alamat ?><br>
        No. Pembelian : <?= $pembelian->id_pembelian ?><br>
        Tanggal : <?= $pembelian->tanggal ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Total Pembelian</strong></th>
            <th><strong>Biaya Pembayaran</strong></th>
        </tr>
        <tr>
            <td><?= $pembelian->jumlah_beli ?></td>
            <td><?= $pembelian->jumlah_bayar ?></td>
        </tr>
    </table>

</body>

</html>