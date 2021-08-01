<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$nama_obat = [
    'name' => 'nama_obat',
    'id' => 'nama_obat',
    'value' => null,
    'class' => 'form-control'
];

$stok = [
    'name' => 'stok',
    'id' => 'stok',
    'value' => null,
    'type' => 'number',
    'class' => 'form-control'
];

$tanggal_kadaluarsa = [
    'name' => 'tanggal_kadaluarsa',
    'id' => 'tanggal_kadaluarsa',
    'value' => null,
    'type' => 'date',
    'class' => 'form-control'
];

$perusahaan = [
    'name' => 'perusahaan',
    'id' => 'perusahaan',
    'value' => null,
    'class' => 'form-control'
];

$foto_obat = [
    'name' => 'foto_obat',
    'id' => 'foto_obat',
    'value' => null,
    'class' => 'form-control'
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
    <h1>insert Obat</h1>
</div>


<div class="col-8">
<div class="card text-dark bg-light mb-3 mt-4">
  <div class="card-header text-center">Form Insert Data Obat</div>
  <div class="card-body"> 
      <div class="row mt-3">
        <!-- Form Tambah Dokter -->
    <!-- Form Tambah Obat -->
    <?= form_open_multipart('admin/obat/create') ?>
        <div class="form-group mt-3">
            <?= form_label("Nama Obat", "nama_obat") ?>
            <?= form_input($nama_obat) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Stok", "stok") ?>
            <?= form_input($stok) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Tanggal Kadaluarsa", "tanggal_kadaluarsa") ?>
            <?= form_input($tanggal_kadaluarsa) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Nama Perusahaan", "perusahaan") ?>
            <?= form_input($perusahaan) ?>
        </div>

        <div class="form-group mt-3">
            <?= form_label("Foto Obat", "foto_obat") ?>
            <!-- Form Upload karena mau upload foto_obat -->
            <?= form_upload($foto_obat) ?>
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