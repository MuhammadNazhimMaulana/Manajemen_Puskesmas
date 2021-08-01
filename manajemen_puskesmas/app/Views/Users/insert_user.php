<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$firstname = [
    'name' => 'firstname',
    'id' => 'firstname',
    'value' => null,
    'class' => 'form-control'
];

$lastname = [
    'name' => 'lastname',
    'id' => 'lastname',
    'value' => null,
    'class' => 'form-control'
];

$ktp = [
    'name' => 'ktp',
    'id' => 'ktp',
    'value' => null,
    'type' => 'number',
    'class' => 'form-control'
];

$alamat = [
    'name' => 'alamat',
    'id' => 'alamat',
    'value' => null,
    'class' => 'form-control'
];

$kota = [
    'name' => 'kota',
    'id' => 'kota',
    'value' => null,
    'class' => 'form-control'
];

$provinsi = [
    'name' => 'provinsi',
    'id' => 'provinsi',
    'value' => null,
    'class' => 'form-control'
];

$kode_pos = [
    'name' => 'kode_pos',
    'id' => 'kode_pos',
    'value' => null,
    'type' => 'number',
    'class' => 'form-control'
];

$email = [
    'name' => 'email',
    'id' => 'email',
    'value' => null,
    'class' => 'form-control'
];

$password = [
    'name' => 'password',
    'id' => 'password',
    'value' => null,
    'type' => 'password',
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
    <h1>Tambah Pengguna</h1>
</div>

<div class="col-8">
<div class="card text-dark bg-light mb-3 mt-4">
        <div class="card-header text-center">Form Insert Data Pasien</div>
            <div class="card-body"> 
                <div class="row mt-3">
                    <!-- Form Tambah Pengguna -->
                    <?= form_open('admin/users/create') ?>
                        <div class="form-group mt-3">
                            <?= form_label("Nama Depan", "firstname") ?>
                            <?= form_input($firstname) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Nama Belakang", "lastname") ?>
                            <?= form_input($lastname) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Nomor KTP", "ktp") ?>
                            <?= form_input($ktp) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Alamat", "alamat") ?>
                            <?= form_input($alamat) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Kota", "kota") ?>
                            <?= form_input($kota) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Provinsi", "provinsi") ?>
                            <?= form_input($provinsi) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Kode Pos", "kode_pos") ?>
                            <?= form_input($kode_pos) ?>
                        </div>
                        
                        <div class="form-group mt-3">
                            <?= form_label("Email", "email") ?>
                            <?= form_input($email) ?>
                        </div>

                        <div class="form-group mt-3">
                            <?= form_label("Password", "password") ?>
                            <?= form_input($password) ?>
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