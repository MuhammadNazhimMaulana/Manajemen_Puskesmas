<?php

namespace App\Models;

use CodeIgniter\Model;

class Ruang_M extends Model
{
    protected $table = 'ruang';

    protected $primaryKey = 'id_ruang';

    protected $allowedFields = ['nama_ruang', 'kapasitas', 'foto_ruang'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Ruang_E';
    protected $useTimestamps = true;

}
