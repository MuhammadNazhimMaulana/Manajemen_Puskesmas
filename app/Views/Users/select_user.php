<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php
if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}
?>


<div class="row  mt-5">
    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/users/create') ?>" role="button">Tambah Data</a>
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
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>KTP</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Kode Pos</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
                <?php $no ?>
                <?php foreach ($user as $key => $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->firstname ?></td>
                        <td><?= $value->lastname ?></td>
                        <td><?= $value->ktp ?></td>
                        <td><?= $value->alamat ?></td>
                        <td><?= $value->kota ?></td>
                        <td><?= $value->provinsi ?></td>
                        <td><?= $value->kode_pos ?></td>
                        <td><?= $value->email ?></td>
                        <td><a href="<?= base_url() ?>/admin/users/delete/<?= $value->id ?>"><img src="http://localhost/manajemen_puskesmas/icon/trash.svg"></a>
                            <a href="<?= base_url() ?>/admin/users/find/<?= $value->id ?>"><img src="http://localhost/manajemen_puskesmas/icon/pencil.svg"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
        <div class="card-footer">
            <?= $pager->links('page', 'bootstrap') ?>
        </div>
</div>

<?= $this->endSection() ?>