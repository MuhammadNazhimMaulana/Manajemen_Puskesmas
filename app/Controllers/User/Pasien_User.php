<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Pasien_M;
use App\Entities\Pasien_E;

class Pasien_User extends BaseController
{
	public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

	    // Load Session
		$this->session = session();
    }
	
	public function read()
	{

		$model = new Pasien_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Jadwal Pasien',
			'pasien_data' => $model->join('users', 'users.id = pasien.id')
            ->join('dokter', 'dokter.id_dokter = pasien.id_dokter')
            ->join('ruang', 'ruang.id_ruang = pasien.id_ruang')
            ->join('pendaftaran', 'pendaftaran.id_daftar = pasien.id_daftar')
            ->join('obat', 'obat.id_obat = pasien.id_obat')->where('pasien.id', session()->get('id'))->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Pasien/select_pasien_user", $data);
	}


	public function selectWhere($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		echo "<h1>Menampilkan data berdasarkan id</h1>";
	}
}
