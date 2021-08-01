<?= $this->extend('template/user') ?>
<?= $this->section('utama') ?>
<?php

$id = [
    'name' => 'id',
    'id' => 'id',
    'options' => $daftar_user,
    'class' => 'form-control',
    'selected' => session()->get('id')
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

<<!-- Bagian Home mulai dari sini -->
    <section class="home" id="home">
        <div class="container mt-5 pr-5">
            <div class="row min-vh-100 align-items-center text-center text-md-left">
                <div class="col-md-6 pr-md-5" data-aos="zoom-in">
                    <img src="http://localhost/manajemen_puskesmas/public/General/images/Doctors.png" width="100%" alt="">
                </div>
                <div class="col-md-6 pl-md-5 content" data-aos="fade-left">
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

                    <div class="col" style="margin-left: -85px; margin-top: -100px;">
                        <h1 style="margin-bottom: 20px;">Mendaftar</h1>
                    </div>

                    <div class="col-8">
                        <!-- Form Tambah Pendaftar -->
                        <?= form_open('admin/pendaftaran_user/create') ?>
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

                            <div class="d-flex justify-content-end mt-3">
                                <!-- Form submit terkait submit-->
                                <?= form_submit($submit) ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian home selesai disini -->
    <!-- Bagian Header Selesai di sini -->

    <section class="home" id="home">

    </section>
    <?= $this->endSection() ?>