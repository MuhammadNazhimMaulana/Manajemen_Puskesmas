<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$id = [
    'name' => 'id',
    'id' => 'id',
    'options' => $user,
    'class' => 'form-control',
    'selected' => $pembelian->id
];

$id_pasien = [
    'name' => 'id_pasien',
    'id' => 'id_pasien',
    'options' => $pasien,
    'class' => 'form-control',
    'selected' => $pembelian->id_pasien
];

$id_transaksi = [
    'name' => 'id_transaksi',
    'id' => 'id_transaksi',
    'options' => $transaksi,
    'class' => 'form-control',
    'selected' => $pembelian->id_transaksi
];

$id_obat = [
    'name' => 'id_obat',
    'id' => 'id_obat',
    'options' => $obat,
    'class' => 'form-control',
    'selected' => $pembelian->id_obat

];

$jumlah_beli = [
    'name' => 'jumlah_beli',
    'id' => 'jumlah_beli',
    'value' => $pembelian->jumlah_beli,
    'class' => 'form-control',
    'type' => 'number'
];

$jumlah_bayar = [
    'name' => 'jumlah_bayar',
    'id' => 'jumlah_bayar',
    'class' => 'form-control',
    'value' => $pembelian->jumlah_bayar,
    'type' => 'hidden'
];

$bukti_bayaran = [
    'name' => 'bukti_bayaran',
    'id' => 'bukti_bayaran',
    'class' => 'form-control',
    'value' => null,
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-success',
    'type' => 'submit'
];

$session = session();
$errors = $session->getFlashdata('errors');
?>

<div class="col">
    <!-- Awal session validasi-->
    <?php if ($errors != null) : ?>
        <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Terjadi Kesalahan</h4>
                <hr>
                <p class="mb-0">
                <?php foreach ($errors as $err) {
                echo $err . '<br>';
                    }

                ?>
                </p>
        </div>
        <?php endif ?>
    <!-- Akhir session validasi -->
</div>

<div class="col">
    <h1>Insert Data</h1>
</div>

<div class="col-8">
<div class="card text-dark bg-light mb-3 mt-4">
  <div class="card-header text-center">Form Update Data Laporan</div>
  <div class="card-body"> 
      <div class="row mt-3">

    <!-- Form Tambah Pembelian -->
    <?= form_open_multipart('admin/pembelian_obat/find/' . $pembelian->id_pembelian) ?>
        <div class="form-group mt-3">
            <?= form_label("Nama", "id") ?>
            <?= form_dropdown($id) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Jadwal Periksa", "id_pasien") ?>
            <?= form_dropdown($id_pasien) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Tanggal Bayar Periksa", "id_transaksi") ?>
            <?= form_dropdown($id_transaksi) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Nama Obat", "id_obat") ?>
            <?= form_dropdown($id_obat) ?>
        </div>
        
        <div class="form-group mt-3">
            <?= form_label("Total Pembelian", "jumlah_beli") ?>
            <?= form_input($jumlah_beli) ?>
        </div>
        
        <div class="form-group mt-3">
            <?= form_label("Total Pembayaran", "jumlah_bayar") ?>
            <?= form_input($jumlah_bayar) ?>
        </div>
        
        <div class="text-center">
                <img class="img-fluid mb-3 mt-3" width="100" src="<?= base_url('upload/Foto Pembelian Obat/' . $pembelian->bukti_bayaran) ?>" alt="image">
        </div>

        <div class="form-group mt-3">
            <?= form_label("Bukti Pembayaran", "bukti_bayaran") ?>
            <!-- Form Upload karena mau upload bukti_bayaran -->
            <?= form_upload($bukti_bayaran) ?>
        </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end mt-3">
            <!-- Form submit terkait submit-->
            <?= form_submit($submit) ?>
        </div>
    </div>
</div>
       

</div>

<?= $this->endSection() ?>