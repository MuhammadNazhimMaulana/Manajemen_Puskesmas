<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pembelian_Obat_M;
use App\Models\Users_M;
use App\Models\Pasien_M;
use App\Models\Transaksi_M;
use App\Models\Obat_M;
use App\Entities\Pembelian_Obat_E;
use App\Entities\Obat_E;

class Pembelian_Obat extends BaseController
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
		$model = new Pembelian_Obat_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pembelian Obat',
			'pembeli_obat_data' => $model->join('users', 'users.id = pembelian_obat.id')
            ->join('pasien', 'pasien.id_pasien = pembelian_obat.id_pasien')
            ->join('transaksi', 'transaksi.id_transaksi = pembelian_obat.id_transaksi')
            ->join('obat', 'obat.id_obat = pembelian_obat.id_obat')->paginate(3, 'page'),
			'pager' => $model->pager,
		];
		return view("Pembelian_Obat/select_pembelian_obat", $data);
	}

	public function create()
	// Untuk melakukan update (Sebelum masuk ke form)
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

		$model_transaksi = new Transaksi_M();
		$transaksi = $model_transaksi->findAll();
        $list_transaksi = [];

        // Buat looping
        foreach ($transaksi as $transactions) {
            $list_transaksi[$transactions->id_transaksi] = $transactions->tanggal;
        }

		$model_obat = new Obat_M();
		$obat = $model_obat->findAll();
        $list_obat = [];

        // Buat looping
        foreach ($obat as $medecines) {
            $list_obat[$medecines->id_obat] = $medecines->nama_obat;
        }

		$data = [
			'user' =>  $list_user,
			'pasien' =>  $list_pasien,
			'transaksi' =>  $list_transaksi,
			'obat' =>  $list_obat,
			'judul' => 'Tambah Transaksi'
		];

        if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data_pembelian_obat = $this->request->getPost();
            $this->validation->run($data_pembelian_obat, 'pembelian_obat');
            $errors = $this->validation->getErrors();
            if (!$errors) {

                // Simpan data
                $model = new Pembelian_Obat_M();

                $pembelian_obat = new Pembelian_Obat_E();

                // Mengurangi Jumlah Stok Karena di kurangi (Awal
                $id_obat = $this->request->getPost('id_obat');
                $data_obat = $model_obat->find($id_obat);

                $entitas_obat = new Obat_E();
                $entitas_obat->id_obat = $id_obat;
                $entitas_obat->stok = $data_obat->stok - $pembelian_obat->jumlah_beli;
                $model_obat->save($entitas_obat);
                // Akhir

                // Fill untuk assign value data
                $pembelian_obat->fill($data_pembelian_obat);
				$pembelian_obat->jumlah_bayar = $pembelian_obat->jumlah_beli *10000;
				$pembelian_obat->bukti_bayaran = $this->request->getFile('bukti_bayaran');
                $pembelian_obat->created_at = date("Y-m-d H:i:s");

                $model->save($pembelian_obat);

                $id_pembelian_obat = $model->insertID();

                $segments = ['admin', 'pembelian_obat'];

                // Akan redirect ke /Admin/pembelian_obat_A/view/$id_pembelian_obat
                return redirect()->to(base_url($segments));
            }
        
			$this->session->setFlashdata('errors', $errors);
		}
		return view('Pembelian_Obat/insert_pembelian_obat', $data);
	}


	public function update()
	{
        $id_pembelian = $this->request->uri->getSegment(4);

        $model = new Pembelian_Obat_M();

        $pembelian =  $model->join('users', 'users.id = pembelian_obat.id')
		->join('pasien', 'pasien.id_pasien = pembelian_obat.id_pasien')
		->join('transaksi', 'transaksi.id_transaksi = pembelian_obat.id_transaksi')
		->join('obat', 'obat.id_obat = pembelian_obat.id_obat')->where('pembelian_obat.id_pembelian', $id_pembelian)->first();

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

		$model_transaksi = new Transaksi_M();
		$transaksi = $model_transaksi->findAll();
        $list_transaksi = [];

        // Buat looping
        foreach ($transaksi as $transactions) {
            $list_transaksi[$transactions->id_transaksi] = $transactions->tanggal;
        }

		$model_obat = new Obat_M();
		$obat = $model_obat->findAll();
        $list_obat = [];

        // Buat looping
        foreach ($obat as $medecines) {
            $list_obat[$medecines->id_obat] = $medecines->nama_obat;
        }

		$data = [
			'user' =>  $list_user,
			'pasien' =>  $list_pasien,
			'transaksi' =>  $list_transaksi,
			'obat' =>  $list_obat,
			'judul' => 'Ubah Pembelian',
			'pembelian' =>  $pembelian,
		];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'pembelian_obat_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $pembelian_obat = new Pembelian_Obat_E();
                $pembelian_obat->id_pembelian = $id_pembelian;
                $pembelian_obat->fill($data);

				if ($this->request->getFile('bukti_bayaran')->isValid()) {
                    $pembelian_obat->bukti_bayaran = $this->request->getFile('bukti_bayaran');
                }

                $pembelian_obat->updated_at = date("Y-m-d H:i:s");

                $model->save($pembelian_obat);

                $segments = ['admin', 'pembelian_obat'];

                return redirect()->to(base_url($segments));
            }

			$this->session->setFlashdata('errors', $errors);
			
        }
		return view('Pembelian_Obat/update_pembelian_obat', $data);	
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Pembelian_Obat_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/pembelian_obat"));
	}
}
