<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Dokter_M;

class Dokter_User extends BaseController
{
	public function read()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$model = new Dokter_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Dokter',
			'spesialis' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Dokter/Dokter_User/select_user_dokter", $data);
	}

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_dokter = $this->request->uri->getSegment(3);

        $model = new Dokter_M();

        $dokter = $model->find($id_dokter);

        // Data yang akan dikirim ke view specific
        $data = [
            "dokter" => $dokter
        ];

		return view("Dokter/Dokter_User/specific_dokter_user", $data);
    }
}
