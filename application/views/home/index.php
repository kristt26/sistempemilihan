<div class="row" ng-controller="homeController">
    <div class="col-md-7">
        <div class="row">
            <div class="col-lg-6 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?=$jumlahpelanggan?></h3>

                        <p>Jumlah Pelanggan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-person"></i>
                    </div>
                    <a href="<?=base_url('pelanggan')?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?=$hasil?></h3>

                        <p>Hasil Seleksi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-list"></i>
                    </div>
                    <a href="<?=base_url('history')?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <h3 class="text-center">SISTEM PEMILIHAN PELANGGAN TERBAIK</h3>
        <p class="text-justify" style="margin-left:20px; margin-right:20px; font-size: 18px;">&emsp;&emsp;&emsp;  Sistem pendukung keputusan seleksi
            pelanggan pada Indihome Customer Gathering menggunakan metode Weighted Product pada PT. Telkom Witel Papua
            digunakan untuk menyeleksi pelanggan secara optimal dan akurat dengan kriteria diantaranya kecepatan
            internet yang digunakan, tanggal pembayaran, dan tahun aktif. Diharapkan sistem yang dibuat akan memberikan
            ketepatan dalam seleksi pelanggan dalam event Indihome Customer Gathering sesuai perhitungan bobot dari
            kriteria yang ditentukan. Sistem ini
            memiliki fitur antara lain:</p>
        <ul>
            <li>View Kriteria dan Sub Kriteria</li>
            <li>Manajemen periode seleksi</li>
            <li>Manajemen pelanggan</li>
            <li>Perhitungan hasil seleksi yang dilengkapi dengan tahapan perhitungan</li>
            <li>Histori perhitungan per periode</li>
        </ul>
    </div>
</div>