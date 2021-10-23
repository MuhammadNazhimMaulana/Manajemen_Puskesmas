<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pendaftaran_M;
use App\Models\Dokter_M;
use App\Models\Users_M;
use App\Entities\Pendaftaran_E;

class Pendaftaran extends BaseController
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
		$model = new Pendaftaran_M();
		
		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pendaftar',
			'daftar_data' => $model->join('users', 'users.id = pendaftaran.id')->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter')->paginate(3, 'pendaftaran'),
			'pager' => $model->pager,
		];

		return view("Pendaftaran/select_pendaftaran", $data);
	}

	public function create()
	{
        // Dapatkan Semua data
        $model_dokter = new Dokter_M();
        $dokter = $model_dokter->findAll();
        $list_dokter = [];

        // Buat looping
        foreach ($dokter as $doctors) {
            $list_dokter[$doctors->id_dokter] = $doctors->nama_dokter;
        }

        // Dapatkan Semua data
        $model_user = new Users_M();
        $pengguna = $model_user->findAll();
        $list_user = [];

        // Buat looping
        foreach ($pengguna as $users) {
            $list_user[$users->id] = $users->firstname;
        }

        $data = [
            'daftar_dokter' => $list_dokter,
            'daftar_user' => $list_user,
            'judul' => 'Tambah Dokter',
        ];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_pendaftaran = $this->request->getPost();
            $this->validation->run($data_pendaftaran, 'pendaftaran');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Pendaftaran_M();

                $pendaftaran = new Pendaftaran_E();

                // Fill untuk assign value data
                $pendaftaran->fill($data_pendaftaran);
                $pendaftaran->created_at = date("Y-m-d H:i:s");

                $model->save($pendaftaran);

                $id_pendaftaran = $model->insertID();

                $segments = ['admin', 'pendaftaran'];

                // Akan redirect ke /Admin/pendaftaran_A/view/$id_pendaftaran
                return redirect()->to(base_url($segments));
            }
		$this->session->setFlashdata('errors', $errors);
        }

		return view('Pendaftaran/insert_pendaftaran', $data);
	}

	public function update()
	// Untuk melakukan update (Sebelum masuk ke form)
	{
        $id_daftar = $this->request->uri->getSegment(4);

        $model = new Pendaftaran_M();

        $pendaftar = $model->join('users', 'users.id = pendaftaran.id')->join('dokter', 'dokter.id_dokter = pendaftaran.id_dokter')->where('pendaftaran.id_daftar', $id_daftar)->first();

        // Dapatkan Semua data
        $model_dokter = new Dokter_M();
        $dokter = $model_dokter->findAll();
        $list_dokter = [];

        // Buat looping
        foreach ($dokter as $doctors) {
            $list_dokter[$doctors->id_dokter] = $doctors->nama_dokter;
        }

        // Dapatkan Semua data
        $model_user = new Users_M();
        $pengguna = $model_user->findAll();
        $list_user = [];

        // Buat looping
        foreach ($pengguna as $users) {
            $list_user[$users->id] = $users->firstname;
        }

        $data_pendaftar = [
            'pendaftar' => $pendaftar,
			'judul' => 'Update Pednaftaran',
            'daftar_dokter' => $list_dokter,
            'daftar_user' => $list_user
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'pendaftaran_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $pendaftaran = new Pendaftaran_E();
                $pendaftaran->id_daftar = $id_daftar;
                $pendaftaran->fill($data);

                $pendaftaran->updated_at = date("Y-m-d H:i:s");

                $model->save($pendaftaran);

                $segments = ['admin', 'pendaftaran'];

                return redirect()->to(base_url($segments));
            }

		$this->session->setFlashdata('errors', $errors);

        }
		return view("Pendaftaran/update_pendaftaran", $data_pendaftar);
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Pendaftaran_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/pendaftaran"));
	}
}
