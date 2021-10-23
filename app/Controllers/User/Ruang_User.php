<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Ruang_M;

class Ruang_User extends BaseController
{
	public function read()
	{
		$model = new Ruang_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Ruangan',
			'room' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Ruang/Ruang_User/select_ruang_user", $data);
	}

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_ruang = $this->request->uri->getSegment(3);

        $model = new Ruang_M();

        $ruang = $model->find($id_ruang);

        // Data yang akan dikirim ke view specific
        $data = [
            "ruang" => $ruang
        ];

		return view("Ruang/Ruang_User/specific_ruang_user", $data);
    }
}
