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

<section class="transaksi" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                    <h1 class="text-center mb-5">Pembelian Obat Anda</h1>
                    <div class="col-md-12 tampung">
                    <?php foreach ($pembeli_obat_data as $key => $value) : ?>
                            <div class="baris">
                                    <div class="kolom">
                                        <div class="kartu-transaksi">
                                                <img style="width:150px; height: 100px; padding-top: 10px;" src="<?= base_url('/upload/Foto Pembelian Obat/' . $value->bukti_bayaran ) ?>">
                                                <h2 class="judul"><?= $value->firstname ?></h2>
                                                <p>Text</p>
                                                <p><a href="<?= base_url() ?>/user/beli_obat/pdf/<?= $value->id_pembelian ?>">PDF</a></p>
                                                <p><button><a href="<?= base_url('user/beli_obat/' . $value->id_pembelian) ?>">Informasi Lebih</a></button></p>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
