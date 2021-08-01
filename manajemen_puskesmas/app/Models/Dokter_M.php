<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokter_M extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $allowedFields = ['nama_dokter', 'rumah_sakit', 'spesialis', 'jadwal_hari', 'jadwal_waktu', 'jenis_klinik', 'foto_dokter', 'created_at', 'updated_at'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Dokter_E';
    protected $useTimestamps = true;

}
