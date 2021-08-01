<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$id = [
    'name' => 'id',
    'id' => 'id',
    'options' => $user,
    'class' => 'form-control',
    'selected' => $pasien->nama
];

$jadwal_periksa = [
    'name' => 'jadwal_periksa',
    'id' => 'jadwal_periksa',
    'value' =>  $pasien->jadwal_periksa,
    'class' => 'form-control',
    'type' => 'date'
];

$id_dokter = [
    'name' => 'id_dokter',
    'id' => 'id_dokter',
    'options' => $dokter,
    'class' => 'form-control',
    'selected' => $pasien->nama_dokter
];

$id_ruang = [
    'name' => 'id_ruang',
    'id' => 'id_ruang',
    'options' => $ruang,
    'class' => 'form-control',
    'selected' => $pasien->nama_ruang
];

$id_daftar = [
    'name' => 'id_daftar',
    'id' => 'id_daftar',
    'options' => $daftar,
    'class' => 'form-control',
    'selected' => $pasien->kebutuhan
];

$id_obat = [
    'name' => 'id_obat',
    'id' => 'id_obat',
    'options' => $obat,
    'class' => 'form-control',
    'selected' => $pasien->nama_obat
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
                <!-- Form Ubah Pasien -->
                <?= form_open('admin/pasien/find/' . $pasien->id_pasien) ?>
                    <div class="form-group mt-3">
                        <?= form_label("Nama Pasien", "id") ?>
                        <?= form_dropdown($id) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Jadwal", "jadwal_periksa") ?>
                        <?= form_input($jadwal_periksa) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Dokter", "id_dokter") ?>
                        <?= form_dropdown($id_dokter) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Ruang", "id_ruang") ?>
                        <?= form_dropdown($id_ruang) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Kebutuhan", "id_daftar") ?>
                        <?= form_dropdown($id_daftar) ?>
                    </div>

                    <div class="form-group mt-3">
                        <?= form_label("Nama Obat", "id_obat") ?>
                        <?= form_dropdown($id_obat) ?>
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