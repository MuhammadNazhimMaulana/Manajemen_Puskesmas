<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_M extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = ['firstname', 'lastname', 'ktp', 'alamat', 'kota', 'provinsi', 'kode_pos', 'email', 'password', 'cretaed_at', 'updated_at'];

    // Memanggil Entity
    protected $returnType    = 'App\Entities\Pengguna_E';
    protected $useTimestamps = true;
}
