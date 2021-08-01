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
                <h1 class="text-center mb-5">Transaksi Anda</h1>
                <div class="col-md-12 tampung">
                    <?php foreach ($trans_data as $key => $value) : ?>
                        <div class="baris">
                                <div class="kolom">
                                    <div class="kartu-transaksi">
                                            <img style="width:150px; height: auto; padding-top: 10px;" src="<?= 'http://localhost/manajemen_puskesmas/public/upload/' . $value->bukti_bayar . '' ?>">
                                            <h2 class="judul"><?= $value->firstname ?></h2>
                                            <p>Text</p>
                                            <p><a href="<?= base_url() ?>/user/transaksi/pdf/<?= $value->id_transaksi ?>">PDF</a></p>
                                            <p><button><a href="<?= base_url('user/transaksi/' . $value->id_transaksi) ?>">Informasi Lebih</a></button></p>
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