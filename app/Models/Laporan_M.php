<?php

namespace App\Models;

use CodeIgniter\Model;

class Laporan_M extends Model
{
    protected $table = 'laporan_pengunjung';

    protected $primaryKey = 'id_laporan';

    protected $allowedFields = ['id_transaksi', 'id_admin', 'tanggal_bergabung', 'tanggal_keluar', 'total_transaksi', 'created_at', 'updated_at'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Laporan_Pengunjung_E';
    protected $useTimestamps = true;

}
