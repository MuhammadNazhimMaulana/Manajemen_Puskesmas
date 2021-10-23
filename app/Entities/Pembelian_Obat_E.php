<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Pembelian_Obat_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setBuktiBayaran($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Foto Pembelian Obat';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['bukti_bayaran'] = $fileName;
        return $this;
    }
}
