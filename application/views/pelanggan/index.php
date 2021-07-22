<div class="row" ng-controller="pelangganController">
    <div class="col-md-6">
        <form action="">
            <div class="form-group row">
                <label for="files" class="col-sm-2 col-form-label">File</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="files"
                                aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="files">Pilih File</label>
                        </div>
                        <!-- <div class="custom-file">
                            <input type="file" class="custom-file-input" id="files"
                                aria-describedby="inputGroupFileAddon01" ng-model="model.file" base-sixty-four-input
                                ng-change="cekFile(model.file)">
                            <label class="custom-file-label"
                                for="files">{{model.file ? model.file.filename:'Pilih File'}}</label>
                        </div>
                        <span ng-show="form.model.file.$error.maxsize">Files must not exceed 5000 KB</span> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; List Petugas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-sm table-hover table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Pelanggan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="item in datas">
                            <td>{{$index+1}}</td>
                            <td>{{item.kodepelanggan}}</td>
                            <td>{{item.nama}}</td>
                            <td><span class="tag tag-success">{{item.alamat}}</span></td>
                            <td>{{item.kontak}}</td>
                            <td>{{item.email}}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                                        class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="showDataUpload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" modal-backdrop
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title">Data Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table datatable="ng" class="table table-sm table-hover table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pelanggan</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>HP</th>
                                    <th>Email</th>
                                    <th>Kecepatan Inet</th>
                                    <th>Tanggal Bayar</th>
                                    <th><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in dataUpload">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.id}}</td>
                                    <td>{{item.nama}}</td>
                                    <td><span class="tag tag-success">{{item.alamat}}</span></td>
                                    <td>{{item.hp}}</td>
                                    <td>{{item.email}}</td>
                                    <td>{{item.kecepataninet}}</td>
                                    <td>{{item.tanggalbayar}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" ng-click="edit(item)"><i
                                                class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>