<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$id = [
    'name' => 'id',
    'id' => 'id',
    'options' => $user,
    'class' => 'form-control',
    'selected' => $transaksi->id
];

$id_pasien = [
    'name' => 'id_pasien',
    'id' => 'id_pasien',
    'options' => $pasien,
    'class' => 'form-control',
    'selected' => $transaksi->id_pasien
];

$biaya_pembayaran = [
    'name' => 'biaya_pembayaran',
    'id' => 'biaya_pembayaran',
    'value' => $transaksi->biaya_pembayaran,
    'class' => 'form-control',
    'type' => 'number'
];

$nama_kasir = [
    'name' => 'nama_kasir',
    'id' => 'nama_kasir',
    'value' => $transaksi->nama_kasir,
    'class' => 'form-control'
];

$bukti_bayar = [
    'name' => 'bukti_bayar',
    'id' => 'bukti_bayar',
    'value' => null,
    'class' => 'form-control'
];

$ket = [
    'name' => 'ket',
    'id' => 'ket',
    'options' => [['' => 'Pilih'], ['Lunas' => 'Lunas'], ['Belum Lunas' => 'Belum Lunas']],
    'class' => 'form-control',
    'selected' => $transaksi->ket
];

$tanggal = [
    'name' => 'tanggal',
    'id' => 'tanggal',
    'value' => $transaksi->tanggal,
    'class' => 'form-control',
    'type' => 'date'
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
    <h1><?= $judul ?></h1>
</div>

<div class="col-8">
<div class="card text-dark bg-light mb-3 mt-4">
    <div class="card-header text-center">Form Update Data Pasien</div>
        <div class="card-body"> 
            <div class="row mt-3">
                <!-- Form Ubah Transaksi -->
                <?= form_open_multipart('admin/transaksi/find/'. $transaksi->id_transaksi) ?>
                    <div class="form-group mt-3">
                        <?= form_label("Nama", "id") ?>
                        <?= form_dropdown($id) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Jadwal Periksa", "id_pasien") ?>
                        <?= form_dropdown($id_pasien) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Biaya Pembayaran", "biaya_pembayaran") ?>
                        <?= form_input($biaya_pembayaran) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Kasir", "nama_kasir") ?>
                        <?= form_input($nama_kasir) ?>
                    </div>

                    <div class="text-center">
                            <img class="img-fluid mb-3 mt-3" width="100" src="<?= base_url('upload/Foto Transaksi/' . $transaksi->bukti_bayar) ?>" alt="image">
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Bukti Pembayaran", "bukti_bayar") ?>
                        <!-- Form Upload karena mau upload bukti_bayar -->
                        <?= form_upload($bukti_bayar) ?>
                    </div>
                    
                    <div class="form-group mt-3">
                        <?= form_label("Keterangan", "ket") ?>
                        <?= form_dropdown($ket) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Tanggal Pembayaran", "tanggal") ?>
                        <?= form_input($tanggal) ?>
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