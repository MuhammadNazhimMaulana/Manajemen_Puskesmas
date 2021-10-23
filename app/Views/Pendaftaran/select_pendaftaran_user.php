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

<!-- Bagian Home mulai dari sini -->
<section class="home" id="home" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="container mt-5 pr-5">
        <div class="row align-items-center text-center text-md-left">
            <div class="col-md-12" data-aos="fade-left">
                <h1 style="margin-left: 0; margin-bottom: 20px;"><?php echo $judul ?></h1>
            </div>
            <?php foreach ($daftar_data as $key => $value) : ?>
                <div class="col-md-3 mb-5" data-aos="fade-left" style="margin-right:65px;">
                    <div class="penampung">
                        <div class="kartu">
                            <div class="lingkaran">
                                <h1><?= $value->firstname ?></h1>
                            </div>
                            <div class="isi_kartu">
                                <p><?= $value->sakit ?></p>
                                <p><?= $value->nama_dokter ?></p>
                                <p><?= $value->kebutuhan ?> </p>
                                <a href="#">Cek Surat</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-md-12 pl-md-5 content mt-5" data-aos="fade-left">
                <h1><span>Terima </span> Kasih
                    <h3><span style="  color: var(--blue);"><?php
                                                            if (!empty(session()->get('firstname'))) {
                                                                echo session()->get('firstname');
                                                                $email = session()->get('email');
                                                            }
                                                            ?></span>, karena sudah mendaftar dan anda bisa mendaftar lagi</h3>
                    <a href="<?= base_url('/user/pendaftaran/create') ?>"><button class="button">Daftar</button></a>
            </div>
        </div>
    </div>
</section>

<!-- Bagian home selesai disini -->

<?= $this->endSection() ?>