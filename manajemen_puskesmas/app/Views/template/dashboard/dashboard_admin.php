<?= $this->extend('template/admin') ?>

<?= $this->section('dashboard') ?>

<div class="row mt-5">
    <div class="col" style="margin-top: 90px; margin-left: 400px;">
        <h3 style="margin-left: 300px; margin-bottom: 50px;">Dashboard</h3>
    </div>
</div>
<div class="row mt-2" style="margin-left: 200px;">
    <div class="col-4">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Total Transaksi</div>
            <div class="card-body">
                <h5 class="card-title"><?= $transaksi ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Total Pembelian Obat</div>
            <div class="card-body">
                <h5 class="card-title"><?= $beli_obat ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Total Pasien</div>
            <div class="card-body">
                <h5 class="card-title"><?= $pasien ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">Jumlah Transaksi</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="transaksi" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">Jumlah Pembelian Obat</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="beli_obat" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">Jumlah Pasien</div>
            <div class="card-body">
                <div class="container-white">
                    <canvas id="pasien" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart JS -->
<script src="<?= base_url('ChartJs/Chart.min.js') ?>"></script>
<script>
    // Chart Untuk transaksi
    var kategori_transaksi = document.getElementById('transaksi');
    var data_transaksi = [];
    var label_transaksi = [];

    <?php foreach ($transaksi_per_kategori->getResult() as $key => $value) : ?>
        data_transaksi.push(<?= $value->jumlah ?>);
        label_transaksi.push('<?= $value->pengguna ?>');
    <?php endforeach ?>

    var data_transaksi_per_kategori = {
        datasets: [{
            data: data_transaksi,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_transaksi,
    }

    var chart_transaksi = new Chart(kategori_transaksi, {
        type: 'doughnut',
        data: data_transaksi_per_kategori
    });

    // Chart Untuk beli_obat
    var kategori_beli_obat = document.getElementById('beli_obat');
    var data_beli_obat = [];
    var label_beli_obat = [];

    <?php foreach ($beli_obat_per_kategori->getResult() as $key => $value) : ?>
        data_beli_obat.push(<?= $value->jumlah ?>);
        label_beli_obat.push('<?= $value->pengguna ?>');
    <?php endforeach ?>

    var data_beli_obat_per_kategori = {
        datasets: [{
            data: data_beli_obat,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_beli_obat,
    }

    var chart_beli_obat = new Chart(kategori_beli_obat, {
        type: 'doughnut',
        data: data_beli_obat_per_kategori
    });

    // Chart Untuk pasien
    var kategori_pasien = document.getElementById('pasien');
    var data_pasien = [];
    var label_pasien = [];

    <?php foreach ($pasien_per_kategori->getResult() as $key => $value) : ?>
        data_pasien.push(<?= $value->jumlah ?>);
        label_pasien.push('<?= $value->pengguna ?>');
    <?php endforeach ?>

    var data_pasien_per_kategori = {
        datasets: [{
            data: data_pasien,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
        }],
        labels: label_pasien,
    }

    var chart_pasien = new Chart(kategori_pasien, {
        type: 'doughnut',
        data: data_pasien_per_kategori
    });
</script>

<?= $this->endSection() ?>