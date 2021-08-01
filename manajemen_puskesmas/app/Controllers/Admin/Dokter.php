<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Dokter_M;
use App\Entities\Dokter_E;

class Dokter extends BaseController
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
		$model = new Dokter_M();
		//$dokter = $model -> findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'DATA DOKTER',
			//'spesialis' => $dokter,
			'spesialis' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Dokter/select", $data);
	}

	public function create()
	// Melakukan insert data atau menambahkan data
	{
        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'dokter');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Dokter_M();

                $dokter = new Dokter_E();

                // Fill untuk assign value data kecuali gambar
                $dokter->fill($data);
				$dokter->foto_dokter = $this->request->getFile('foto_dokter');
                $dokter->created_at = date("Y-m-d H:i:s");

                $model->save($dokter);

                $id_dokter = $model->insertID();

                $segments = ['admin', 'dokter'];

                // Akan redirect ke /admin/dokter/
                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
        }
        return view('Dokter/insert');
	}

	public function update()
	{
        $id_dokter = $this->request->uri->getSegment(4);

        $model = new Dokter_M();

        $dokter = $model->find($id_dokter);

        $data_dokter = [
            'dokter' => $dokter,
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'dokter_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $dokter = new Dokter_E();
                $dokter->id_dokter = $id_dokter;
                $dokter->fill($data);

                if ($this->request->getFile('foto_dokter')->isValid()) {
                    $dokter->foto_dokter = $this->request->getFile('foto_dokter');
                }

                $dokter->updated_at = date("Y-m-d H:i:s");

                $model->save($dokter);

                $segments = ['admin', 'dokter'];

                return redirect()->to(base_url($segments));
            }
        }

		return view("Dokter/update", $data_dokter);
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{

		$model = new Dokter_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/dokter"));
	}
}
