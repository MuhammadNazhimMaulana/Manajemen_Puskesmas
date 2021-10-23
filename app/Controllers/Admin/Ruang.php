<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Ruang_M;
use App\Entities\Ruang_E;

class Ruang extends BaseController
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
	// Digunakan untuk menampilkan seluruh data ruang
	{
		$pager = \Config\Services::pager();
		$model = new Ruang_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Ruangan',
			//'spesialis' => $ruang,
			'room' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Ruang/select_ruang", $data);
	}

	public function create()
	{
        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'ruang');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Ruang_M();

                $ruang = new Ruang_E();

                // Fill untuk assign value data kecuali gambar
                $ruang->fill($data);
				$ruang->foto_ruang = $this->request->getFile('foto_ruang');
                $ruang->created_at = date("Y-m-d H:i:s");

                $model->save($ruang);

                $id_ruang = $model->insertID();

                $segments = ['admin', 'ruang'];

                // Akan redirect ke /admin/ruang/
                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
        }
		return view("Ruang/insert_ruang");
	}

	public function update()
	{
        $id_ruang = $this->request->uri->getSegment(4);

        $model = new Ruang_M();

        $ruang = $model->find($id_ruang);

        $data_ruang = [
            'ruang' => $ruang,
			'judul' => 'Update Ruang'
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'ruang_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $ruang = new Ruang_E();
                $ruang->id_ruang = $id_ruang;
                $ruang->fill($data);

                if ($this->request->getFile('foto_ruang')->isValid()) {
                    $ruang->foto_ruang = $this->request->getFile('foto_ruang');
                }

                $ruang->updated_at = date("Y-m-d H:i:s");

                $model->save($ruang);

                $segments = ['admin', 'ruang'];

                return redirect()->to(base_url($segments));
            }
        }
		return view("Ruang/update_ruang", $data_ruang);
	}

	public function delete($id = null)
	{
		$model = new Ruang_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/ruang/read"));
	}
}
