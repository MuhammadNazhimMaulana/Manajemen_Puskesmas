<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>
<?php

$nama_dokter = [
    'name' => 'nama_dokter',
    'id' => 'nama_dokter',
    'value' => $dokter->nama_dokter,
    'class' => 'form-control'
];

$rumah_sakit = [
    'name' => 'rumah_sakit',
    'id' => 'rumah_sakit',
    'value' => $dokter->rumah_sakit,
    'class' => 'form-control'
];

$spesialis = [
    'name' => 'spesialis',
    'id' => 'spesialis',
    'value' => $dokter->spesialis,
    'class' => 'form-control',
];

$jadwal_hari = [
    'name' => 'jadwal_hari',
    'id' => 'jadwal_hari',
    'value' => $dokter->nama_dokter,
    'class' => 'form-control',
];

$jadwal_waktu = [
    'name' => 'jadwal_waktu',
    'id' => 'jadwal_waktu',
    'value' => $dokter->jadwal_waktu,
    'class' => 'form-control',
];

$jenis_klinik = [
    'name' => 'jenis_klinik',
    'id' => 'jenis_klinik',
    'value' => $dokter->jenis_klinik,
    'class' => 'form-control',
];

$foto_dokter = [
    'name' => 'foto_dokter',
    'id' => 'foto_dokter',
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
    <h1>Update Data Dokter</h1>
</div>

<div class="col-8">
<div class="card text-dark bg-light mb-3 mt-4">
  <div class="card-header text-center">Form Update Data Dokter</div>
  <div class="card-body"> 
      <div class="row mt-3">
          <!-- Form Ubah Dokter -->
          <?= form_open_multipart('admin/dokter/find/' . $dokter->id_dokter) ?>
              <div class="form-group mt-3">
                  <?= form_label("Nama Dokter", "nama_dokter") ?>
                  <?= form_input($nama_dokter) ?>
              </div>
      
              <div class="form-group mt-3">
                  <?= form_label("Rumah Sakit", "rumah_sakit") ?>
                  <?= form_input($rumah_sakit) ?>
              </div>
      
              <div class="form-group mt-3">
                  <?= form_label("Spesialis", "spesialis") ?>
                  <?= form_input($spesialis) ?>
              </div>
      
              <div class="form-group mt-3">
                  <?= form_label("Jadwal (Hari)", "jadwal_hari") ?>
                  <?= form_input($jadwal_hari) ?>
              </div>
      
              <div class="form-group mt-3">
                  <?= form_label("Jadwal (Jam)", "jadwal_waktu") ?>
                  <?= form_input($jadwal_waktu) ?>
              </div>
      
              <div class="form-group mt-3">
                  <?= form_label("Jenis Klinik", "jenis_klinik") ?>
                  <?= form_input($jenis_klinik) ?>
              </div>
      
              <div class="text-center">
                  <img class="img-fluid mb-3 mt-3" width="100" src="<?= base_url('upload/Foto Dokter/' . $dokter->foto_dokter) ?>" alt="image">
              </div>
      
              <div class="form-group mt-3">
                  <?= form_label("Foto Dokter", "foto_dokter") ?>
      
                  <!-- Form Upload karena mau upload foto_dokter -->
                  <?= form_upload($foto_dokter) ?>
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