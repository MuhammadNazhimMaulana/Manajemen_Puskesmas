<?php

namespace App\Controllers\User;

use TCPDF;
use App\Controllers\BaseController;
use App\Models\Transaksi_M;

class Transaksi_User extends BaseController
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
			'trans_data' => $model->join('users', 'users.id = transaksi.id')->join('pasien', 'pasien.id_pasien = transaksi.id_pasien')->where('transaksi.id', session()->get('id'))->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Transaksi/Transaksi_User/select_transaksi_user", $data);
	}

    public function view()
    {
        // Dapatkan Id dari segmen
        $id_transaksi = $this->request->uri->getSegment(3);

        $model = new Transaksi_M();

        $transaksi = $model->join('users', 'users.id = transaksi.id')->join('pasien', 'pasien.id_pasien = transaksi.id_pasien')->where('transaksi.id_transaksi', $id_transaksi)->first();

        // Data yang akan dikirim ke view specific
        $data = [
            "transaksi" => $transaksi
        ];

		return view("Transaksi/Transaksi_User/specific_transaksi_user", $data);
    }

	public function pdf()
    {
        // Mengambil Id dari segment
        $id_transaksi = $this->request->uri->getSegment(4);

        $model = new Transaksi_M();

        $transaksi = $model->join('users', 'users.id = transaksi.id')->join('pasien', 'pasien.id_pasien = transaksi.id_pasien')->where('transaksi.id_transaksi', $id_transaksi)->first();

        $data = [
            'transaksi' => $transaksi,
        ];

        $html = view('Transaksi/Transaksi_User/invoice_transaksi', $data);

        // Skrip menggunakan TCPDF
        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Muhammad Nazhim Maulana');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        // Menghilangkan garis header dan footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // Output HTML
        $pdf->writeHTML($html, true, false, true, false, '');

        // Penting agar browser menampilkan pdf
        $this->response->setContentType('application/pdf');

        // Membuat dokumen pdf (F untuk write file di folder yang dipilih)
        $pdf->Output('Invoice.pdf', 'I');
    }
}
