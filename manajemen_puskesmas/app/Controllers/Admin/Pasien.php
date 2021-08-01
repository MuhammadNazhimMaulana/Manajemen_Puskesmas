<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Users_M;
use App\Entities\Pasien_E;
use App\Models\Dokter_M;
use App\Models\Pasien_M;
use App\Models\Pendaftaran_M;
use App\Models\Ruang_M;
use App\Models\Obat_M;

class Pasien extends BaseController
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
		$pager = \Config\Services::pager();
		$model = new Pasien_M();
		//$dokter = $model -> findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pasien',
			'pasien_data' => $model->join('users', 'users.id = pasien.id')
            ->join('dokter', 'dokter.id_dokter = pasien.id_dokter')
            ->join('ruang', 'ruang.id_ruang = pasien.id_ruang')
            ->join('pendaftaran', 'pendaftaran.id_daftar = pasien.id_daftar')
            ->join('obat', 'obat.id_obat = pasien.id_obat')->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Pasien/select_pasien", $data);
	}


	public function create()
	// Melakukan insert data atau menambahkan data
	{
		$model_user = new Users_M();
		$user = $model_user->findAll();
        $list_user = [];

        // Buat looping
        foreach ($user as $users) {
            $list_user[$users->id] = $users->firstname;
        }


		$model_dokter = new Dokter_M();
		$dokter = $model_dokter->findAll();
        $list_dokter = [];

        // Buat looping
        foreach ($dokter as $doctors) {
            $list_dokter[$doctors->id_dokter] = $doctors->nama_dokter;
        }

		$model_ruang = new Ruang_M();
		$ruang = $model_ruang->findAll();
        $list_ruang = [];

        // Buat looping
        foreach ($ruang as $rooms) {
            $list_ruang[$rooms->id_ruang] = $rooms->nama_ruang;
        }

		$model_pendaftaran = new Pendaftaran_M();
		$pendaftaran = $model_pendaftaran->findAll();
        $list_pendaftaran = [];

        // Buat looping
        foreach ($pendaftaran as $daftar) {
            $list_pendaftaran[$daftar->id_daftar] = $daftar->kebutuhan;
        }

		$model_obat = new Obat_M();
		$obat = $model_obat->findAll();
        $list_obat = [];

        // Buat looping
        foreach ($obat as $medicine) {
            $list_obat[$medicine->id_obat] = $medicine->nama_obat;
        }


		$data = [
			'user' =>  $list_user,
			'dokter' =>  $list_dokter,
			'ruang' =>  $list_ruang,
			'daftar' =>  $list_pendaftaran,
			'obat' =>  $list_obat,
			'judul' => 'Tambah Pasien'
		];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_pasien = $this->request->getPost();
            $this->validation->run($data_pasien, 'pasien');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Pasien_M();

                $pasien = new Pasien_E();

                // Fill untuk assign value data
                $pasien->fill($data_pasien);
                $pasien->created_at = date("Y-m-d H:i:s");

                $model->save($pasien);

                $id_pasien = $model->insertID();

                $segments = ['admin', 'pasien'];

                // Akan redirect ke /Admin/pasien_A/view/$id_pasien
                return redirect()->to(base_url($segments));
            }
        
			$this->session->setFlashdata('errors', $errors);
		}
		return view('Pasien/insert_pasien', $data);
	}

	public function update()
	{
        $id_pasien = $this->request->uri->getSegment(4);

        $model = new Pasien_M();

        $pasien = $model->join('users', 'users.id = pasien.id')
		->join('dokter', 'dokter.id_dokter = pasien.id_dokter')
		->join('ruang', 'ruang.id_ruang = pasien.id_ruang')
		->join('pendaftaran', 'pendaftaran.id_daftar = pasien.id_daftar')
		->join('obat', 'obat.id_obat = pasien.id_obat')->where('pasien.id_pasien', $id_pasien)->first();

		$model_user = new Users_M();
		$user = $model_user->findAll();
        $list_user = [];

        // Buat looping
        foreach ($user as $users) {
            $list_user[$users->id] = $users->firstname;
        }


		$model_dokter = new Dokter_M();
		$dokter = $model_dokter->findAll();
        $list_dokter = [];

        // Buat looping
        foreach ($dokter as $doctors) {
            $list_dokter[$doctors->id_dokter] = $doctors->nama_dokter;
        }

		$model_ruang = new Ruang_M();
		$ruang = $model_ruang->findAll();
        $list_ruang = [];

        // Buat looping
        foreach ($ruang as $rooms) {
            $list_ruang[$rooms->id_ruang] = $rooms->nama_ruang;
        }

		$model_pendaftaran = new Pendaftaran_M();
		$pendaftaran = $model_pendaftaran->findAll();
        $list_pendaftaran = [];

        // Buat looping
        foreach ($pendaftaran as $daftar) {
            $list_pendaftaran[$daftar->id_daftar] = $daftar->kebutuhan;
        }

		$model_obat = new Obat_M();
		$obat = $model_obat->findAll();
        $list_obat = [];

        // Buat looping
        foreach ($obat as $medicine) {
            $list_obat[$medicine->id_obat] = $medicine->nama_obat;
        }


		$data = [
			'user' =>  $list_user,
			'dokter' =>  $list_dokter,
			'ruang' =>  $list_ruang,
			'daftar' =>  $list_pendaftaran,
			'obat' =>  $list_obat,
			'pasien' =>  $pasien,
			'judul' => 'Ubah Pasien'
		];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'pasien_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $pasien = new Pasien_E();
                $pasien->id_pasien = $id_pasien;
                $pasien->fill($data);

                $pasien->updated_at = date("Y-m-d H:i:s");

                $model->save($pasien);

                $segments = ['admin', 'pasien'];

                return redirect()->to(base_url($segments));
            }
        }
		return view('Pasien/update_pasien', $data);		
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Pasien_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/pasien"));
	}
}
