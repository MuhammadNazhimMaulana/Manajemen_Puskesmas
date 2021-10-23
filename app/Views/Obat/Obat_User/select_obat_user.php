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

<section class="dokter" style="margin-top: 150px;">
<div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                    <div class="col-md-12">
                        <div class="tampungan">
                            <h1>Daftar Obat</h1>
                            <div class="isi_tampungan">
                                <?php foreach ($obat as $key => $value) : ?>
                            <a href="<?= base_url('user/obat_user/' . $value->id_obat) ?>" class="daftar">
                                <img src="<?= base_url("upload/Foto Obat/" . $value->foto_obat)?>">
                                <small><?= $value->nama_obat?></small>
                                <h2>Petunjuknya</h2>
                                <p class="penjelasan"><?= $value->stok ?></p>
                                    <div class="lebih">
                                        <p>Baca</p>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </div>
                            </a>
                                <?php endforeach; ?>
                        </div>
                        <?= $pager->links('page', 'bootstrap') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>