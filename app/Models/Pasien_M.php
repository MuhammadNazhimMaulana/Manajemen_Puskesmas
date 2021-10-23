<?php

namespace App\Models;

use CodeIgniter\Model;

class Pasien_M extends Model
{
    protected $table = 'pasien';

    protected $primaryKey = 'id_pasien';

    protected $allowedFields = ['id', 'jadwal_periksa', 'id_dokter', 'id_ruang', 'id_daftar', 'id_obat', 'created_at', 'updated_at'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Pasien_E';
    protected $useTimestamps = true;    

}
