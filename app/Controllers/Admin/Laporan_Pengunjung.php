<?php

namespace App\Controllers\Admin;

use TCPDF;
use App\Controllers\BaseController;
use App\Models\Laporan_M;
use App\Models\Transaksi_M;
use App\Models\Admin_M;
use App\Entities\Laporan_Pengunjung_E;

class Laporan_Pengunjung extends BaseController
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
		$model = new Laporan_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Laporan Keuangan',
			'laporan_data' => $model->join('transaksi', 'transaksi.id_transaksi = laporan_pengunjung.id_transaksi')
            ->join('admin', 'admin.id_admin = laporan_pengunjung.id_admin')->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Laporan_Pengunjung/select_laporan_pengunjung", $data);
	}

	public function create()
	{

		$model_admin = new Admin_M();
		$admin = $model_admin->findAll();
        $list_admin = [];

        // Buat looping
        foreach ($admin as $administrator) {
            $list_admin[$administrator['id_admin']] = $administrator['nama'];
        }

		$model_transaksi = new Transaksi_M();
		$transaksi = $model_transaksi->findAll();
        $list_transaksi = [];

        // Buat looping
        foreach ($transaksi as $transactions) {
            $list_transaksi[$transactions->id_transaksi] = $transactions->ket;
        }

		$data = [
			'admin' =>  $list_admin,
			'transaksi' =>  $list_transaksi,
			'judul' => 'Tambah Transaksi'
		];

		if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'laporan_pengunjung');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Laporan_M();

                $laporan = new Laporan_Pengunjung_E();

                // Fill untuk assign value data kecuali gambar
                $laporan->fill($data);
                $laporan->created_at = date("Y-m-d H:i:s");

                $model->save($laporan);

                $id_laporan = $model->insertID();

                $segments = ['admin', 'laporan_pengunjung'];

                // Akan redirect ke /admin/user/
                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
		}

		return view('Laporan_Pengunjung/insert_laporan_pengunjung', $data);
	}

	public function update()
	{
        $id_laporan = $this->request->uri->getSegment(4);

        $model = new Laporan_M();

        $laporan = $model->join('transaksi', 'transaksi.id_transaksi = laporan_pengunjung.id_transaksi')
		->join('admin', 'admin.id_admin = laporan_pengunjung.id_admin')->find($id_laporan);

		$model_admin = new Admin_M();
		$admin = $model_admin->findAll();
        $list_admin = [];

        // Buat looping
        foreach ($admin as $administrator) {
            $list_admin[$administrator['id_admin']] = $administrator['nama'];
        }

		$model_transaksi = new Transaksi_M();
		$transaksi = $model_transaksi->findAll();
        $list_transaksi = [];

        // Buat looping
        foreach ($transaksi as $transactions) {
            $list_transaksi[$transactions->id_transaksi] = $transactions->ket;
        }

        $data_laporan = [
            'laporan' => $laporan,
			'admin' =>  $list_admin,
			'transaksi' =>  $list_transaksi,
			'judul' => 'Update users'
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'laporan_pengunjung_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $laporan = new Laporan_Pengunjung_E();
                $laporan->id_laporan = $id_laporan;
                $laporan->fill($data);
                $laporan->updated_at = date("Y-m-d H:i:s");

                $model->save($laporan);

                $segments = ['admin', 'laporan_pengunjung'];

                return redirect()->to(base_url($segments));
            }
           
        $this->session->setFlashdata('errors', $errors);
        }
		return view("Laporan_Pengunjung/update_laporan_pengunjung", $data_laporan);
	}
    
	public function delete($id = null)
	// Untuk melakukan delete
	{
        $model = new Laporan_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/laporan_pengunjung"));
	}
    
    public function pdf(){
        
                // Mengambil Id dari segment
                $id_laporan = $this->request->uri->getSegment(4);

                $model = new Laporan_M();
        
                $laporan = $model->join('transaksi', 'transaksi.id_transaksi = laporan_pengunjung.id_transaksi')
                ->join('admin', 'admin.id_admin = laporan_pengunjung.id_admin')->find($id_laporan);

                $data = [
                    'laporan' => $laporan,
                ];
        
                $html = view('Laporan_Pengunjung/invoice_laporan_pengunjung', $data);
        
                // Skrip menggunakan TCPDF
                $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);
        
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Muhammad Nazhim Maulana');
                $pdf->SetTitle('Invoice Laporan Pengunjung');
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
                $pdf->Output('Invoice_Laporan_Pengunjung.pdf', 'I');

    }
    
}
