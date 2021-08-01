<?= $this->extend('template/user') ?>

<?= $this->section('utama') ?>

<section class="user" style="margin-top: 80px;">
    <div class="container">
        <div class="box-container">
            <div class="box" data-aos="fade-up">
               <div class="kartu_profile">
                   <div class="kontainer_gambar">
                       <img src="<?= base_url("upload/shirt.png") ?>" style="width: 100%">
                       <div class="judul_nama">
                           <h2>Nama User</h2>
                        </div>
                    </div>
                    <div class="kontainer_utama">
                        <p><i class="fa fa-briefcase informasi_lagi"></i>Tutorial Mudah</p>
                        <p><i class="fa fa-home informasi_lagi"></i>Tutorial Mudah</p>
                        <p><i class="fa fa-envelope informasi_lagi"></i><?= $user->email ?></p>
                        <p><i class="fa fa-phone informasi_lagi"></i>Tutorial Mudah</p>
                        <hr>
                    </div>
                    <div class="tombol_ubah">
                        <a href="#">
                        <span></span>    
                        Ubah Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>