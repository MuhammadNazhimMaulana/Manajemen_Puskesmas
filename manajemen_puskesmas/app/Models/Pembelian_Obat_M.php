<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembelian_Obat_M extends Model
{
    protected $table = 'pembelian_obat';

    protected $primaryKey = 'id_pembelian';

    protected $allowedFields = ['id', 'id_pasien', 'id_transaksi', 'id_obat', 'jumlah_beli', 'jumlah_bayar', 'bukti_bayaran', 'created_at', 'updated_at'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Pembelian_Obat_E';
    protected $useTimestamps = true;

}
