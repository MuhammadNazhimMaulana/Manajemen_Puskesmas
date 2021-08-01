<?php

namespace App\Controllers\User;

use TCPDF;
use App\Controllers\BaseController;
use App\Models\Pembelian_Obat_M;

class Pembelian_Obat_User extends BaseController
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
		$model = new Pembelian_Obat_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pembelian Obat',
			'pembeli_obat_data' => $model->join('users', 'users.id = pembelian_obat.id')
            ->join('pasien', 'pasien.id_pasien = pembelian_obat.id_pasien')
            ->join('transaksi', 'transaksi.id_transaksi = pembelian_obat.id_transaksi')
            ->join('obat', 'obat.id_obat = pembelian_obat.id_obat')->where('pembelian_obat.id', session()->get('id'))->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Pembelian_Obat/Pembelian_Obat_User/select_pembelian_obat_user", $data);
	}

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_pembelian = $this->request->uri->getSegment(3);

        $model = new Pembelian_Obat_M();

        $pembelian = $model->join('users', 'users.id = pembelian_obat.id')
        ->join('pasien', 'pasien.id_pasien = pembelian_obat.id_pasien')
        ->join('transaksi', 'transaksi.id_transaksi = pembelian_obat.id_transaksi')
        ->join('obat', 'obat.id_obat = pembelian_obat.id_obat')->where('pembelian_obat.id_pembelian', $id_pembelian)->first();

        // Data yang akan dikirim ke view specific
        $data = [
            "pembelian" => $pembelian
        ];

		return view("Pembelian_Obat/Pembelian_Obat_User/specific_pembelian_obat_user", $data);
    }

	public function pdf()
    {
        // Mengambil Id dari segment
        $id_pembelian = $this->request->uri->getSegment(4);

        $model = new Pembelian_Obat_M();

        $pembelian = $model->join('users', 'users.id = pembelian_obat.id')
		->join('pasien', 'pasien.id_pasien = pembelian_obat.id_pasien')
		->join('transaksi', 'transaksi.id_transaksi = pembelian_obat.id_transaksi')
		->join('obat', 'obat.id_obat = pembelian_obat.id_obat')->where('pembelian_obat.id_pembelian', $id_pembelian)->first();

        $data = [
            'pembelian' => $pembelian,
        ];

        $html = view('Pembelian_Obat/Pembelian_Obat_User/invoice_pembelian_obat', $data);

        // Skrip menggunakan TCPDF
        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Muhammad Nazhim Maulana');
        $pdf->SetTitle('Invoice Pembelian Obat User');
        $pdf->SetSubject('Invoice');

        // Menghilangkan garis header dan footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // Output HTML
        $pdf->writeHTML($html, true, false, true, false, '');
		
		// Atur Gambar
		$pdf->Image('upload/Foto Pembelian Obat/'. $pembelian->bukti_bayaran, '', '', 40, '', 'PNG', '', 'T', false, 300, 'C', false, false, 0, false, false, false);
		
        // Penting agar browser menampilkan pdf
        $this->response->setContentType('application/pdf');

        // Membuat dokumen pdf (F untuk write file di folder yang dipilih)
        $pdf->Output('Invoice_Pembelian_Obat.pdf', 'I');
    }
}
