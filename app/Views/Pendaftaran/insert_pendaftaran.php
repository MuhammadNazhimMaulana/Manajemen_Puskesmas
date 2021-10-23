<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$id = [
    'name' => 'id',
    'id' => 'id',
    'options' => $daftar_user,
    'class' => 'form-control'
];

$sakit = [
    'name' => 'sakit',
    'id' => 'sakit',
    'value' => null,
    'class' => 'form-control'
];

$id_dokter = [
    'name' => 'id_dokter',
    'id' => 'id_dokter',
    'options' => $daftar_dokter,
    'class' => 'form-control'
];

$kebutuhan = [
    'name' => 'kebutuhan',
    'id' => 'kebutuhan',
    'options' => ['Pilih', 'Urgent', 'Tidak Urgent'],
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
    <h1>Insert Data</h1>
</div>

<div class="col-8">
    <div class="card text-dark bg-light mb-3 mt-4">
        <div class="card-header text-center">Form Insert Data Pendaftaran</div>
            <div class="card-body"> 
                <div class="row mt-3">
                <!-- Form Tambah Pendaftar -->
                <?= form_open('admin/pendaftaran/create') ?>
                    <div class="form-group mt-3">
                        <?= form_label("Nama Depan Pasien", "id") ?>
                        <?= form_dropdown($id) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Keluhan", "sakit") ?>
                        <?= form_input($sakit) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Dokter", "id_dokter") ?>
                        <?= form_dropdown($id_dokter) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Kebutuhan", "kebutuhan") ?>
                        <?= form_dropdown($kebutuhan) ?>
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