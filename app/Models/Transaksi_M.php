<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_M extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $allowedFields = ['id', 'id_pasien', 'biaya_pembayaran', 'nama_kasir', 'bukti_bayar', 'ket', 'tanggal', 'created_at', 'updated_at'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Transaksi_E';
    protected $useTimestamps = true;
}
