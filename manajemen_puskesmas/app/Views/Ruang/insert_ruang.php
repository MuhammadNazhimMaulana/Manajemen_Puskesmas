<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$nama_ruang = [
    'name' => 'nama_ruang',
    'id' => 'nama_ruang',
    'value' => null,
    'class' => 'form-control'
];

$kapasitas = [
    'name' => 'kapasitas',
    'id' => 'kapasitas',
    'value' => null,
    'type' => 'number',
    'class' => 'form-control'
];

$foto_ruang = [
    'name' => 'foto_ruang',
    'id' => 'foto_ruang',
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
    <h1>Insert Ruang</h1>
</div>

<div class="col-8">
<div class="card text-dark bg-light mb-3 mt-4">
        <div class="card-header text-center">Form Insert Data Pendaftaran</div>
            <div class="card-body"> 
                <div class="row mt-3">
                    <!-- Form Tambah Ruang -->
                    <?= form_open_multipart('admin/ruang/create') ?>
                        <div class="form-group mt-3">
                            <?= form_label("Nama Ruang", "nama_ruang") ?>
                            <?= form_input($nama_ruang) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Kapasitas Ruang", "kapasitas") ?>
                            <?= form_input($kapasitas) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Foto Ruang", "foto_ruang") ?>
                            <!-- Form Upload karena mau upload foto_ruang -->
                            <?= form_upload($foto_ruang) ?>
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