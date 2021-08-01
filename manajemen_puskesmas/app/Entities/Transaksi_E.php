<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Transaksi_E extends Entity
{
    // Logika untuk menyimpan File gambar
    public function setBuktiBayar($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './upload/Foto Transaksi';

        // Save ke folder uploads
        $file->move($writePath, $fileName);

        // Simpan nama file
        $this->attributes['bukti_bayar'] = $fileName;
        return $this;
    }
}
