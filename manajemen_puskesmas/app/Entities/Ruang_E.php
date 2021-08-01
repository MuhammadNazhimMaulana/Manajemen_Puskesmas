<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Ruang_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setFotoRuang($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Foto Ruang';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['foto_ruang'] = $fileName;
        return $this;
    }
}
