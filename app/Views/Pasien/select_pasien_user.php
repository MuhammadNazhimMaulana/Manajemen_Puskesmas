<?= $this->extend('template/user') ?>

<?= $this->section('utama') ?>

<?php
if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
} else {
    $no = 1;
}
?>

<section class="pasien" style="margin-top: 150px; margin-bottom:100px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="col" style="margin-bottom: 100px;">
                    <h1 class="text-center"><?= $judul ?></h1>
                </div>
                <div class="col-md-12">
                            <table class="jadwal" style="font-size: 1.5rem;">
                                <tr class="test">
                                    <th>No.</th>
                                    <th>Nama Pasien</th>
                                    <th>Jadwal Periksa</th>
                                    <th>Pemeriksa</th>
                                    <th>Ruang</th>
                                    <th>Pendaftaran</th>
                                </tr>
                                <?php $no ?>
                                <?php foreach ($pasien_data as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->firstname ?></td>
                                        <td><?= $value->jadwal_periksa ?></td>
                                        <td><?= $value->nama_dokter ?></td>
                                        <td><?= $value->nama_ruang ?></td>
                                        <td><?= $value->kebutuhan ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                </div>
                <div class="page">
                    <?=$pager->links('page', 'bootstrap')?> 
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>