<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$id_transaksi = [
    'name' => 'id_transaksi',
    'id' => 'id_transaksi',
    'options' => $transaksi,
    'class' => 'form-control'
];

$id_admin = [
    'name' => 'id_admin',
    'id' => 'id_admin',
    'options' => $admin,
    'class' => 'form-control'
];

$tanggal_bergabung = [
    'name' => 'tanggal_bergabung',
    'id' => 'tanggal_bergabung',
    'value' => null,
    'class' => 'form-control',
    'type' => 'date'
];

$tanggal_keluar = [
    'name' => 'tanggal_keluar',
    'id' => 'tanggal_keluar',
    'value' => null,
    'class' => 'form-control',
    'type' => 'date'
];

$total_transaksi = [
    'name' => 'total_transaksi',
    'id' => 'total_transaksi',
    'value' => null,
    'class' => 'form-control',
    'type' => 'number'
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
    <h3>Insert Data Dokter</h3>
</div>

<div class="col-8">
<div class="card text-dark bg-light mb-3 mt-4">
  <div class="card-header text-center">Form Insert Data Laporan</div>
  <div class="card-body"> 
      <div class="row mt-3">
    <!-- Form Tambah Pasien -->
    <?= form_open('admin/laporan_pengunjung/create') ?>
        <div class="form-group mt-3">
            <?= form_label("Keterangan Transaksi", "id_transaksi") ?>
            <?= form_dropdown($id_transaksi) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Nama Pembuat", "id_admin") ?>
            <?= form_dropdown($id_admin) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Tanggal Bergabung", "tanggal_bergabung") ?>
            <?= form_input($tanggal_bergabung) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Tanggal Keluar", "tanggal_keluar") ?>
            <?= form_input($tanggal_keluar) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Total Transaksi", "total_transaksi") ?>
            <?= form_input($total_transaksi) ?>
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