<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Transaksi_M;
use App\Models\Pasien_M;
use App\Models\Pembelian_Obat_M;

class Admin_Page extends BaseController
{
	public function index()
	{
		$model_transaksi = new Transaksi_M();
		$model_beli_obat = new Pembelian_Obat_M();
		$model_pasien = new Pasien_M();

		$transaksi_per_kategori = $model_transaksi->select('COUNT(transaksi.id_transaksi) AS jumlah, users.firstname AS pengguna')
		->join('users', 'transaksi.id=users.id')
		->groupBy('transaksi.id')
		->get();

		$beli_obat_per_kategori = $model_beli_obat->select('COUNT(pembelian_obat.id_pembelian) AS jumlah, users.firstname AS pengguna')
		->join('users', 'pembelian_obat.id=users.id')
		->groupBy('pembelian_obat.id')
		->get();
		
		$pasien_per_kategori = $model_pasien->select('COUNT(pasien.id_pasien) AS jumlah, users.firstname AS pengguna')
		->join('users', 'pasien.id=users.id')
		->groupBy('pasien.id')
		->get();

		$data = [
			"transaksi" => $model_transaksi->like('id_transaksi')->countAllResults(),
            "beli_obat" => $model_beli_obat->like('id_pembelian')->countAllResults(),
            "pasien" => $model_pasien->like('id_pasien')->countAllResults(),
			"transaksi_per_kategori" => $transaksi_per_kategori,
			"beli_obat_per_kategori" => $beli_obat_per_kategori,
			"pasien_per_kategori" => $pasien_per_kategori,
		];

		return view('template/dashboard/dashboard_admin', $data);
	}
	public function side()
	{
		return view('template/side_bar');
	}
}
