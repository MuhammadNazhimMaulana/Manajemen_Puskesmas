<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<?php
if (isset($_GET['page_pendaftaran'])) {
    $page = $_GET['page_pendaftaran'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}
?>


<div class="row  mt-5">
    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/pendaftaran/create') ?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h3><?php echo $judul ?></h3>
    </div>

</div>


<div class="card text-dark bg-light mb-3 mt-4">
  <div class="card-header text-center">Search</div>
    <div class="card-body"> 
        <div class="row mt-3">
            <table class="table">
                <tr>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Spesialis</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                <?php $no ?>
                <?php foreach ($daftar_data as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->firstname ?></td>
                        <td><?= $value->sakit ?></td>
                        <td><?= $value->nama_dokter ?></td>
                        <td><?= $value->kebutuhan ?></td>
                        <td><a href="<?= base_url() ?>/admin/pendaftaran/delete/<?= $value->id_daftar ?>"><img src="http://localhost/manajemen_puskesmas/icon/trash.svg"></a>
                            <a href="<?= base_url() ?>/admin/pendaftaran/find/<?= $value->id_daftar ?>"><img src="http://localhost/manajemen_puskesmas/icon/pencil.svg"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
        <div class="card-footer">
            <?= $pager->links('pendaftaran', 'bootstrap') ?>
        </div>
</div>

<?= $this->endSection() ?>