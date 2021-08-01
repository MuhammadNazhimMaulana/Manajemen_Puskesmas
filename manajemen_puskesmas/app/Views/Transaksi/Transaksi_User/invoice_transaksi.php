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

    <title>Perpustakaan Online | Invoice Transaksi User</title>
</head>

<body>
    <div style="font-size: 64px; color: '#dddddd'; "><i>Invoice</i></div>
    <p>
        <i>Bonevian Library</i><br>
        Bandung, Indonesia <br>
        048124848
    </p>
    <p>
        Peminjam : <?= $transaksi->firstname?><br>
        Alamat : <?= $transaksi->alamat ?><br>
        No. Transaksi : <?= $transaksi->id_transaksi ?><br>
        Tanggal : <?= $transaksi->tanggal ?>
    </p>
    <table cellpadding="6">
        <tr>
            <th><strong>Nama Kasir</strong></th>
            <th><strong>Biaya Pembayaran</strong></th>
            <th><strong>Keterangan</strong></th>
        </tr>
        <tr>
            <td><?= $transaksi->nama_kasir ?></td>
            <td><?= $transaksi->biaya_pembayaran ?></td>
            <td><?= $transaksi->ket ?></td>
        </tr>
    </table>
</body>

</html>