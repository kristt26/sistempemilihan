<div ng-controller="historyController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="files" class="col-sm-2 col-form-label">Jumlah Ranking</label>
                        <div class="col-sm-2">
                            <select class="form-control form-control-sm"
                                ng-options="item as item.periode for item in periodes track by item.id"
                                ng-model="periode" ng-change="show()">

                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" ng-show="datasHistory.length>0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Hasil Analisa</h3>
                                <div class="card-tools">
                                    <button class="btn btn-info btn-sm" ng-click="print()"><i class="fas fa-print"></i>
                                        Print</button>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <div id="print">
                                    <div class="screen">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <img src="<?=base_url('public/img/logoo.png');?>" width="100px">
                                        </div>
                                        <h1>LAPORAN PELANGGAN INDIHOME TERBAIK</h1>
                                        <h3 class="font-italic">INDIHOME CUSTOMER GATHERING </h3>
                                        <h3>PERIODE {{periode.periode}}</h3>
                                        <!-- <hr class="style2" style="margin-bottom:12px"><br> -->
                                    </div>
                                    <table
                                        class="table table-sm table-hover table-bordered text-nowrap table-head-fixed ">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in datasHistory">
                                                <td>{{$index+1}}</td>
                                                <td>{{item.nama}}</td>
                                                <td>{{item.nilai | number : 3}}</td>
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
                                <label for="hari" class="col-form-label col-form-label-sm">Hari Pelaksanaan</label>
                                <input type="text" class="form-control  form-control-sm" id="hari" ng-model="info.hari"
                                    placeholder="Hari Pelaksanaan">
                            </div>
                            <div class="form-group">
                                <label for="tempat" class="col-form-label col-form-label-sm">Hari Pelaksanaan</label>
                                <input type="text" class="form-control  form-control-sm" id="tempat"
                                    ng-model="info.tempat" placeholder="Tempat Pelaksanaan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fas fa-paper-plane"></i>Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>