<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftaran_M extends Model
{
    protected $table = 'pendaftaran';

    protected $primaryKey = 'id_daftar';

    protected $allowedFields = ['id', 'sakit', 'id_dokter', 'kebutuhan', 'created_at', 'updated_at'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Pendaftaran_E';
    protected $useTimestamps = true;    

}
