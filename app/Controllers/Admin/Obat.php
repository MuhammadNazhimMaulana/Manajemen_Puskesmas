<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Obat_M;
use App\Entities\Obat_E;

class Obat extends BaseController
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
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$model = new Obat_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Obat',
			//'spesialis' => $dokter,
			'obat' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Obat/select_obat", $data);
	}


	public function create()
	// Melakukan insert data atau menambahkan data
	{
		if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'obat');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Obat_M();

                $obat = new Obat_E();

                // Fill untuk assign value data kecuali gambar
                $obat->fill($data);
				$obat->foto_obat = $this->request->getFile('foto_obat');
                $obat->created_at = date("Y-m-d H:i:s");

                $model->save($obat);

                $id_obat = $model->insertID();

                $segments = ['admin', 'obat'];

                // Akan redirect ke /admin/obat/
                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
		}
		return view("Obat/insert_obat");
	}


	public function update()
	{
        $id_obat = $this->request->uri->getSegment(4);

        $model = new Obat_M();

        $obat = $model->find($id_obat);

        $data_obat = [
            'obat' => $obat,
			'judul' => 'Update Obat'
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'obat_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $obat = new Obat_E();
                $obat->id_obat = $id_obat;
                $obat->fill($data);

                if ($this->request->getFile('foto_obat')->isValid()) {
                    $obat->foto_obat = $this->request->getFile('foto_obat');
                }

                $obat->updated_at = date("Y-m-d H:i:s");

                $model->save($obat);

                $segments = ['admin', 'obat'];

                return redirect()->to(base_url($segments));
            }
           
        $this->session->setFlashdata('errors', $errors);
        }
		return view("obat/update_obat", $data_obat);
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Obat_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/obat/read"));
	}
}
