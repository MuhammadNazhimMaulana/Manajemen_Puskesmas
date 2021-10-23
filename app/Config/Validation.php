<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules

	public $dokter = [
		'nama_dokter' => [
			'rules' => 'required|min_length[3]',
		],
		'rumah_sakit' => [
			'rules' => 'required',
		],
		'spesialis' => [
			'rules' => 'required',
		],
		'jadwal_hari' => [
			'rules' => 'required',
		],
		'jadwal_waktu' => [
			'rules' => 'required',
		],
		'jenis_klinik' => [
			'rules' => 'required',
		],
		'foto_dokter' => [
			'rules' => 'uploaded[foto_dokter]',
		],
	];

	public $dokter_errors = [
		'nama_dokter' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'rumah_sakit' => [
			'required' => '{field} Harus diisi',
		],
		'spesialis' => [
			'required' => '{field} Harus diisi',
		],
		'jadwal_hari' => [
			'required' => '{field} Harus diisi',
		],
		'jadwal_waktu' => [
			'required' => '{field} Harus diisi',
		],
		'jenis_klinik' => [
			'required' => '{field} Harus diisi',
		],
		'foto_dokter' => [
			'uploaded' => '{field} Harus di upload',
		],
	];

	public $dokter_update = [
		'nama_dokter' => [
			'rules' => 'required|min_length[3]',
		],
		'rumah_sakit' => [
			'rules' => 'required',
		],
		'spesialis' => [
			'rules' => 'required',
		],
		'jadwal_hari' => [
			'rules' => 'required',
		],
		'jadwal_waktu' => [
			'rules' => 'required',
		],
		'jenis_klinik' => [
			'rules' => 'required',
		],
	];

	public $dokter_update_errors = [
		'nama_dokter' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'rumah_sakit' => [
			'required' => '{field} Harus diisi',
		],
		'spesialis' => [
			'required' => '{field} Harus diisi',
		],
		'jadwal_hari' => [
			'required' => '{field} Harus diisi',
		],
		'jadwal_waktu' => [
			'required' => '{field} Harus diisi',
		],
		'jenis_klinik' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $ruang = [
		'nama_ruang' => [
			'rules' => 'required|min_length[3]',
		],
		'kapasitas' => [
			'rules' => 'required',
		],
		'foto_ruang' => [
			'rules' => 'uploaded[foto_ruang]',
		],
	];

	public $ruang_errors = [
		'nama_ruang' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'kapasitas' => [
			'required' => '{field} Harus diisi',
		],
		'foto_ruang' => [
			'uploaded' => '{field} Harus di upload',
		],
	];

	public $ruang_update = [
		'nama_ruang' => [
			'rules' => 'required|min_length[3]',
		],
		'kapasitas' => [
			'rules' => 'required',
		],
	];

	public $ruang_update_errors = [
		'nama_ruang' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'kapasitas' => [
			'required' => '{field} Harus diisi',
		],
	];
	
	public $obat = [
		'nama_obat' => [
			'rules' => 'required|min_length[3]',
		],
		'stok' => [
			'rules' => 'required',
		],
		'tanggal_kadaluarsa' => [
			'rules' => 'required',
		],
		'perusahaan' => [
			'rules' => 'required',
		],
		'foto_obat' => [
			'rules' => 'uploaded[foto_obat]',
		],
	];

	public $obat_errors = [
		'nama_obat' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'stok' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_kadaluarsa' => [
			'required' => '{field} Harus diisi',
		],
		'perusahaan' => [
			'required' => '{field} Harus diisi',
		],
		'foto_obat' => [
			'uploaded' => '{field} Harus di upload',
		],
	];

	public $obat_update = [
		'nama_obat' => [
			'rules' => 'required|min_length[3]',
		],
		'stok' => [
			'rules' => 'required',
		],
		'tanggal_kadaluarsa' => [
			'rules' => 'required',
		],
		'perusahaan' => [
			'rules' => 'required',
		],
	];

	public $obat_update_errors = [
		'nama_obat' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'stok' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_kadaluarsa' => [
			'required' => '{field} Harus diisi',
		],
		'perusahaan' => [
			'required' => '{field} Harus diisi',
		],
	];
	
	public $pendaftaran = [
		'id' => [
			'rules' => 'required',
		],
		'sakit' => [
			'rules' => 'required',
		],
		'id_dokter' => [
			'rules' => 'required',
		],
		'kebutuhan' => [
			'rules' => 'required',
		],
	];

	public $pendaftaran_errors = [
		'id' => [
			'required' => '{field} Harus diisi',
		],
		'sakit' => [
			'required' => '{field} Harus diisi',
		],
		'id_dokter' => [
			'required' => '{field} Harus diisi',
		],
		'kebutuhan' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $pendaftaran_update = [
		'id' => [
			'rules' => 'required',
		],
		'sakit' => [
			'rules' => 'required',
		],
		'id_dokter' => [
			'rules' => 'required',
		],
		'kebutuhan' => [
			'rules' => 'required',
		],
	];

	public $pendaftaran_update_errors = [
		'id' => [
			'required' => '{field} Harus diisi',
		],
		'sakit' => [
			'required' => '{field} Harus diisi',
		],
		'id_dokter' => [
			'required' => '{field} Harus diisi',
		],
		'kebutuhan' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $pasien = [
		'id' => [
			'rules' => 'required',
		],
		'jadwal_periksa' => [
			'rules' => 'required',
		],
		'id_dokter' => [
			'rules' => 'required',
		],
		'id_ruang' => [
			'rules' => 'required',
		],
		'id_daftar' => [
			'rules' => 'required',
		],
	];

	public $pasien_errors = [
		'id' => [
			'required' => '{field} Harus diisi',
		],
		'jadwal_periksa' => [
			'required' => '{field} Harus diisi',
		],
		'id_dokter' => [
			'required' => '{field} Harus diisi',
		],
		'id_ruang' => [
			'required' => '{field} Harus diisi',
		],
		'id_daftar' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $pasien_update = [
		'id' => [
			'rules' => 'required',
		],
		'jadwal_periksa' => [
			'rules' => 'required',
		],
		'id_dokter' => [
			'rules' => 'required',
		],
		'id_ruang' => [
			'rules' => 'required',
		],
		'id_daftar' => [
			'rules' => 'required',
		],
		'id_obat' => [
			'rules' => 'required',
		],
	];

	public $pasien_update_errors = [
		'id' => [
			'required' => '{field} Harus diisi',
		],
		'jadwal_periksa' => [
			'required' => '{field} Harus diisi',
		],
		'id_dokter' => [
			'required' => '{field} Harus diisi',
		],
		'id_ruang' => [
			'required' => '{field} Harus diisi',
		],
		'id_daftar' => [
			'required' => '{field} Harus diisi',
		],
		'id_obat' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $transaksi = [
		'id' => [
			'rules' => 'required',
		],
		'id_pasien' => [
			'rules' => 'required',
		],
		'biaya_pembayaran' => [
			'rules' => 'required',
		],
		'nama_kasir' => [
			'rules' => 'required',
		],
		'bukti_bayar' => [
			'rules' => 'uploaded[bukti_bayar]',
		],
		'ket' => [
			'rules' => 'required',
		],
		'tanggal' => [
			'rules' => 'required',
		],
	];

	public $transaksi_errors = [
		'id' => [
			'required' => '{field} Harus diisi',
		],
		'id_pasien' => [
			'required' => '{field} Harus diisi',
		],
		'biaya_pembayaran' => [
			'required' => '{field} Harus diisi',
		],
		'nama_kasir' => [
			'required' => '{field} Harus diisi',
		],
		'bukti_bayar' => [
			'uploaded' => '{field} Harus di upload',
		],
		'ket' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $transaksi_update = [
		'id' => [
			'rules' => 'required',
		],
		'id_pasien' => [
			'rules' => 'required',
		],
		'biaya_pembayaran' => [
			'rules' => 'required',
		],
		'nama_kasir' => [
			'rules' => 'required',
		],
		'ket' => [
			'rules' => 'required',
		],
		'tanggal' => [
			'rules' => 'required',
		],
	];

	public $transaksi_update_errors = [
		'id' => [
			'required' => '{field} Harus diisi',
		],
		'id_pasien' => [
			'required' => '{field} Harus diisi',
		],
		'biaya_pembayaran' => [
			'required' => '{field} Harus diisi',
		],
		'nama_kasir' => [
			'required' => '{field} Harus diisi',
		],
		'ket' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $pembelian_obat = [
		'id' => [
			'rules' => 'required',
		],
		'id_pasien' => [
			'rules' => 'required',
		],
		'id_transaksi' => [
			'rules' => 'required',
		],
		'id_obat' => [
			'rules' => 'required',
		],
		'jumlah_beli' => [
			'rules' => 'required',
		],
		'bukti_bayaran' => [
			'rules' => 'uploaded[bukti_bayaran]',
		],
	];

	public $pembelian_obat_errors = [
		'id' => [
			'required' => '{field} Harus diisi',
		],
		'id_pasien' => [
			'required' => '{field} Harus diisi',
		],
		'id_transaksi' => [
			'required' => '{field} Harus diisi',
		],
		'id_obat' => [
			'required' => '{field} Harus diisi',
		],
		'jumlah_beli' => [
			'required' => '{field} Harus diisi',
		],
		'bukti_bayaran' => [
			'uploaded' => '{field} Harus di upload',
		],
	];

	public $pembelian_obat_update = [
		'id' => [
			'rules' => 'required',
		],
		'id_pasien' => [
			'rules' => 'required',
		],
		'id_transaksi' => [
			'rules' => 'required',
		],
		'id_obat' => [
			'rules' => 'required',
		],
		'jumlah_beli' => [
			'rules' => 'required',
		],
		'jumlah_bayar' => [
			'rules' => 'required',
		],
	];

	public $pembelian_obat_update_errors = [
		'id' => [
			'required' => '{field} Harus diisi',
		],
		'id_pasien' => [
			'required' => '{field} Harus diisi',
		],
		'id_transaksi' => [
			'required' => '{field} Harus diisi',
		],
		'id_obat' => [
			'required' => '{field} Harus diisi',
		],
		'jumlah_beli' => [
			'required' => '{field} Harus diisi',
		],
		'jumlah_bayar' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $users = [
		'firstname' => [
			'rules' => 'required',
		],
		'lastname' => [
			'rules' => 'required',
		],
		'ktp' => [
			'rules' => 'required',
		],
		'alamat' => [
			'rules' => 'required',
		],
		'kota' => [
			'rules' => 'required',
		],
		'email' => [
			'rules' => 'required',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $users_errors = [
		'firstname' => [
			'required' => '{field} Harus diisi',
		],
		'lastname' => [
			'required' => '{field} Harus diisi',
		],
		'ktp' => [
			'required' => '{field} Harus diisi',
		],
		'alamat' => [
			'required' => '{field} Harus diisi',
		],
		'kota' => [
			'required' => '{field} Harus diisi',
		],
		'email' => [
			'required' => '{field} Harus diisi',
		],
		'password' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $users_update = [
		'firstname' => [
			'rules' => 'required',
		],
		'lastname' => [
			'rules' => 'required',
		],
		'ktp' => [
			'rules' => 'required',
		],
		'alamat' => [
			'rules' => 'required',
		],
		'kota' => [
			'rules' => 'required',
		],
		'email' => [
			'rules' => 'required',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $users_update_errors = [
		'firstname' => [
			'required' => '{field} Harus diisi',
		],
		'lastname' => [
			'required' => '{field} Harus diisi',
		],
		'ktp' => [
			'required' => '{field} Harus diisi',
		],
		'alamat' => [
			'required' => '{field} Harus diisi',
		],
		'kota' => [
			'required' => '{field} Harus diisi',
		],
		'email' => [
			'required' => '{field} Harus diisi',
		],
		'password' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $laporan_pengunjung = [
		'id_transaksi' => [
			'rules' => 'required',
		],
		'id_admin' => [
			'rules' => 'required',
		],
		'tanggal_bergabung' => [
			'rules' => 'required',
		],
		'tanggal_keluar' => [
			'rules' => 'required',
		],
		'total_transaksi' => [
			'rules' => 'required',
		],
	];

	public $laporan_pengunjung_errors = [
		'id_transaksi' => [
			'required' => '{field} Harus diisi',
		],
		'id_admin' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_bergabung' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_keluar' => [
			'required' => '{field} Harus diisi',
		],
		'total_transaksi' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $laporan_pengunjung_update = [
		'id_transaksi' => [
			'rules' => 'required',
		],
		'id_admin' => [
			'rules' => 'required',
		],
		'tanggal_bergabung' => [
			'rules' => 'required',
		],
		'tanggal_keluar' => [
			'rules' => 'required',
		],
		'total_transaksi' => [
			'rules' => 'required',
		],
	];

	public $laporan_pengunjung_update_errors = [
		'id_transaksi' => [
			'required' => '{field} Harus diisi',
		],
		'id_admin' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_bergabung' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_keluar' => [
			'required' => '{field} Harus diisi',
		],
		'total_transaksi' => [
			'required' => '{field} Harus diisi',
		],
	];

	//--------------------------------------------------------------------
}
