<?php

namespace App\Models;

use CodeIgniter\Model;

class Obat_M extends Model
{
    protected $table = 'obat';

    protected $primaryKey = 'id_obat';

    protected $allowedFields = ['nama_obat', 'stok', 'tanggal_kadaluarsa', 'perusahaan', 'foto_obat', 'created_at', 'updated_at'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Obat_E';
    protected $useTimestamps = true;
}
