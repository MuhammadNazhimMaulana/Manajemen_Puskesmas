<?= $this->extend('template/user') ?>

<?= $this->section('utama') ?>

<section class="obat" style="margin-top: 150px;">
<div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <h1 class="text-center mb-5">Detail Ruang</h1>
                    <div class="pelapis">
                        <div class="kartu_pelapis">
                            <div class="gambar_obat">
                                <div class="gambar_utama"><img src="<?= base_url('upload/Foto Ruang/' . $ruang->foto_ruang) ?>" alt=""></div>
                            </div>
                            <div class="informasi_obat">
                                <h1 class="text-center"><?= $ruang->nama_ruang ?></h1>
                                <div class="harga_obat">
                                    <h3><?= $ruang->kapasitas ?></h3>
                                </div>
                                <div class="informasi_obat_pilihan">
                                    <h5>Deskripsi</h5>
                                </div>
                                <div class="konten_informasi_obat">
                                    <p>Ruangan ini hanya bisa memuat maksimal <?= $ruang->kapasitas ?> Orang</p>
                                </div>
                                <div class="tombol_beli">
                                    <button><a href="<?= base_url('user/ruang_user') ?>">Kembali Ke Daftar</a></button>
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