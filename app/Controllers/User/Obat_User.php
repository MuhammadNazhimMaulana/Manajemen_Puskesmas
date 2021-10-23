<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Obat_M;

class Obat_User extends BaseController
{
	public function read()
	{
		$model = new Obat_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Obat',
			'obat' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Obat/Obat_User/select_obat_user", $data);
	}


    public function view()
    {
        // Dapatkan Id dari segmen
        $id_obat = $this->request->uri->getSegment(3);

        $model = new Obat_M();

        $Obat = $model->find($id_obat);

        // Data yang akan dikirim ke view specific
        $data = [
            "Obat" => $Obat
        ];

		return view("Obat/Obat_User/specific_obat", $data);
    }

}
