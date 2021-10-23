<?= $this->extend('template/user') ?>

<?= $this->section('utama') ?>

<section class="obat" style="margin-top: 150px;">
<div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <h1 class="text-center mb-5">Detail Dokter</h1>
                    <div class="pelapis">
                        <div class="kartu_pelapis">
                            <div class="gambar_obat">
                                <div class="gambar_utama_dokter"><img src="<?= base_url('upload/Foto Dokter/' . $dokter->foto_dokter) ?>" alt=""></div>
                            </div>
                            <div class="informasi_obat">
                                <h1 class="text-center"><?= $dokter->nama_dokter ?></h1>
                                <div class="harga_obat">
                                    <h3><?= $dokter->jadwal_waktu ?></h3>
                                </div>
                                <div class="informasi_obat_pilihan">
                                    <h5>Deskripsi</h5>
                                </div>
                                <div class="konten_informasi_obat">
                                    <p>Dokter ini adalah seorang dokter <?= $dokter->spesialis ?> yang bekerja setiap hari <?= $dokter->jadwal_hari ?></p>
                                </div>
                                <div class="tombol_beli">
                                    <button><a href="<?= base_url('user/dokter_user') ?>">Kembali Ke Daftar</a></button>
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