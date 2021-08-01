<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Obat_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setFotoObat($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Foto Obat';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['foto_obat'] = $fileName;
        return $this;
    }
}
