<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Dokter_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setFotoDokter($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Foto Dokter';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['foto_dokter'] = $fileName;
        return $this;
    }
}
