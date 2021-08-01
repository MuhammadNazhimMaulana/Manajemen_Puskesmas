<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Users_M;
use App\Models\Transaksi_M;
use App\Models\Pasien_M;
use App\Entities\Transaksi_E;

class Transaksi extends BaseController
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
		$model = new Transaksi_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Transaksi',
			'trans_data' => $model->join('users', 'users.id = transaksi.id')->join('pasien', 'pasien.id_pasien = transaksi.id_pasien')->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Transaksi/select_transaksi", $data);
	}

	public function create()
	{
		$model_user = new Users_M();
		$user = $model_user->findAll();
        $list_user = [];

        // Buat looping
        foreach ($user as $users) {
            $list_user[$users->id] = $users->firstname;
        }

		$model_pasien = new Pasien_M();
		$pasien = $model_pasien->findAll();
        $list_pasien = [];

        // Buat looping
        foreach ($pasien as $patients) {
            $list_pasien[$patients->id_pasien] = $patients->jadwal_periksa;
        }


		$data = [
			'user' =>  $list_user,
			'pasien' =>  $list_pasien,
			'judul' => 'Tambah Transaksi'
		];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_transaksi = $this->request->getPost();
            $this->validation->run($data_transaksi, 'transaksi');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Transaksi_M();

                $transaksi = new Transaksi_E();

                // Fill untuk assign value data
                $transaksi->fill($data_transaksi);
				$transaksi->bukti_bayar = $this->request->getFile('bukti_bayar');
                $transaksi->created_at = date("Y-m-d H:i:s");

                $model->save($transaksi);

                $id_transaksi = $model->insertID();

                $segments = ['admin', 'transaksi'];

                // Akan redirect ke /Admin/transaksi_A/view/$id_transaksi
                return redirect()->to(base_url($segments));
            }
        
			$this->session->setFlashdata('errors', $errors);
		}
		return view('transaksi/insert_transaksi', $data);
	}


	public function update()
	{
        $id_transaksi = $this->request->uri->getSegment(4);

        $model = new Transaksi_M();

        $transaksi =  $model->join('users', 'users.id = transaksi.id')->join('pasien', 'pasien.id_pasien = transaksi.id_pasien')->where('transaksi.id_transaksi', $id_transaksi)->first();

		$model_user = new Users_M();
		$user = $model_user->findAll();
        $list_user = [];

        // Buat looping
        foreach ($user as $users) {
            $list_user[$users->id] = $users->firstname;
        }

		$model_pasien = new Pasien_M();
		$pasien = $model_pasien->findAll();
        $list_pasien = [];

        // Buat looping
        foreach ($pasien as $patients) {
            $list_pasien[$patients->id_pasien] = $patients->jadwal_periksa;
        }

		$data = [
			'user' =>  $list_user,
			'pasien' =>  $list_pasien,
			'judul' => 'Tambah Transaksi',
			'transaksi' =>  $transaksi,
		];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksi_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $transaksi = new Transaksi_E();
                $transaksi->id_transaksi = $id_transaksi;
                $transaksi->fill($data);

				if ($this->request->getFile('bukti_bayar')->isValid()) {
                    $transaksi->bukti_bayar = $this->request->getFile('bukti_bayar');
                }

                $transaksi->updated_at = date("Y-m-d H:i:s");

                $model->save($transaksi);

                $segments = ['admin', 'transaksi'];

                return redirect()->to(base_url($segments));
            }

			$this->session->setFlashdata('errors', $errors);
			
        }
		return view('Transaksi/update_transaksi', $data);	
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Transaksi_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/transaksi"));
	}

	// public function option()
	// {
	// 	$model = new Users_M();
	// 	$user = $model->findAll();
	// 	$data = [
	// 		'user' => $user
	// 	];
	// 	return view('template/option', $data);
	// }
}
