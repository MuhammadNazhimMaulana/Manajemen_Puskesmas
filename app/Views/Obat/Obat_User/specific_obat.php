<?= $this->extend('template/user') ?>

<?= $this->section('utama') ?>

<section class="obat" style="margin-top: 150px;">
<div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <h1 class="text-center mb-5">Detail Obat</h1>
                    <div class="pelapis">
                        <div class="kartu_pelapis">
                            <div class="gambar_obat">
                                <div class="gambar_utama"><img src="<?= base_url('upload/Foto Obat/' . $Obat->foto_obat) ?>" alt=""></div>
                            </div>
                            <div class="informasi_obat">
                                <h1 class="text-center"><?= $Obat->nama_obat ?></h1>
                                <div class="harga_obat">
                                    <h3><?= $Obat->stok ?></h3>
                                </div>
                                <div class="informasi_obat_pilihan">
                                    <h5>Deskripsi</h5>
                                </div>
                                <div class="konten_informasi_obat">
                                    <p>Obat ini adalah obat yang dibuat oleh <?= $Obat->perusahaan ?> dan akan kadaluarsa pada tanggal <?= $Obat->tanggal_kadaluarsa ?></p>
                                </div>
                                <div class="tombol_beli">
                                    <button><a href="#">Beli Sekarang</a></button>
                                    <button><a href="<?= base_url('user/obat_user') ?>">Kembali Ke Daftar</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>