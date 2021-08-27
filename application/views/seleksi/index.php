<div ng-controller="seleksiController">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="files" class="col-sm-4 col-form-label">Jumlah Ranking</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="number" class="col-sm-4 form-control float-right form-control-sm"
                                ng-model="jumlahRanking" ng-change="setNilaiRank()">
                            <button class="btn btn-primary btn-sm" ng-click="proses(jumlahRanking)">Proses</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" ng-show="tampil">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Bobot Kriteria</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm table-hover table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">Kode</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in datas.wp.bobot">
                                        <td>{{item.kode}}</td>
                                        <td>{{item.bobot}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Normalisasi Bobot</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm table-hover table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">Kode</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in datas.wp.normalisasibobot">
                                        <td>{{item.kode}}</td>
                                        <td>{{item.bobot}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Data Matriks</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 200px;">
                            <table class="table table-sm table-hover table-bordered text-nowrap table-head-fixed ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th ng-repeat="item in datas.matriks[0].nilai" style="width: 15%;"
                                            class="text-center">
                                            {{item.kode}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in datas.matriks">
                                        <td>{{$index+1}}</td>
                                        <td>{{item.nama}}</td>
                                        <td ng-repeat="nilaiKriteria in item.nilai" class="text-center">
                                            {{nilaiKriteria.bobot}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Nilai Vektor</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 200px;">
                            <table class="table table-sm table-hover table-bordered text-nowrap table-head-fixed ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th ng-repeat="item in datas.matriks[0].nilai" style="width: 15%;"
                                            class="text-center">
                                            {{item.kode}}</th>
                                        <th>Vector</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in datas.wp.vector">
                                        <td>{{$index+1}}</td>
                                        <td>{{item.nama}}</td>
                                        <td ng-repeat="nilaiKriteria in item.nilai" class="text-center">
                                            {{nilaiKriteria.bobot | number : 3}}
                                        </td>
                                        <td>{{item.vector | number : 3}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Hasil Analisa</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm"
                                    ng-click="save(datas.wp.ranking | limitTo: (jumlahRanking==0 || jumlahRanking < 0) ? '' : jumlahRanking)"><i
                                        class="fas fa-save"></i> Simpan</button>
                                <button class="btn btn-success btn-sm"
                                    ng-click="setNilai(datas.wp.ranking | limitTo: (jumlahRanking==0 || jumlahRanking < 0) ? '' : jumlahRanking)"><i
                                        class="fas fa-paper-plane"></i> Send</button>
                                <button class="btn btn-info btn-sm" ng-show="dataKirim" ng-click="print()"><i
                                        class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <div id="print">
                                <div class="screen">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <img src="<?=base_url('public/img/logoo.png');?>" width="250px">
                                    </div>
                                    <h1>LAPORAN PELANGGAN INDIHOME TERBAIK</h1>
                                    <h3 class="font-italic">INDIHOME CUSTOMER GATHERING </h3>
                                    <h3>PERIODE {{periode.periode}}</h3>
                                    <hr class="style2" style="margin-bottom:12px"><br>
                                </div>
                                <table class="table table-sm table-hover table-bordered text-nowrap table-head-fixed ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            ng-repeat="item in datas.wp.ranking | limitTo: (jumlahRanking==0 || jumlahRanking < 0) ? '' : jumlahRanking">
                                            <td>{{$index+1}}</td>
                                            <td>{{item.nama}}</td>
                                            <td>{{item.preferensi}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setInfo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" modal-backdrop
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Seting Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" ng-submit="send(info)">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="hari" class="col-form-label col-form-label-sm">Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control  form-control-sm" id="hari" ng-model="info.hari">
                        </div>
                        <div class="form-group">
                            <label for="tempat" class="col-form-label col-form-label-sm">Tempat Pelaksanaan</label>
                            <input type="text" class="form-control  form-control-sm" id="tempat" ng-model="info.tempat"
                                placeholder="Tempat Pelaksanaan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>