<div ng-controller="kriteriaController">
    <div class="col-md-12">
        <div class="row">
          <!-- <div class="col-md-4">
              <div class="card card-danger">
                  <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Input Kriteria</h3>
                  </div>
                  <div class="card-body">
                      <form role="form" ng-submit="save('kriteria')">
                          <div class="form-group">
                              <label for="kode" class="col-form-label col-form-label-sm">Kode</label>
                              <input type="text" class="form-control  form-control-sm" id="kode" ng-model="model.kode"
                                  placeholder="Kode Kriteria" required>
                          </div>
                          <div class="form-group">
                              <label for="nama" class="col-form-label col-form-label-sm">Nama Kriteria</label>
                              <input type="text" class="form-control  form-control-sm" id="nama" ng-model="model.nama"
                                  placeholder="Nama Kriteria" required>
                          </div>
                          <div class="form-group">
                              <label for="type" class="col-form-label col-form-label-sm">Type Kriteria</label>
                              <select class="form-control" ng-model="model.type" id="type">
                                  <option value="Benefits">Benefits</option>
                                  <option value="Cost">Cost</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="bobot" class="col-form-label col-form-label-sm">Bobot</label>
                              <input type="number" class="form-control  form-control-sm" id="bobot" ng-model="model.bobot"
                                  placeholder="Bobot Kriteria" required>
                          </div>
                          <div class="form-group d-flex justify-content-between">
                              <button type="button"
                                  class="btn btn-secondary btn-sm pull-right">Clear</button>
                              <button type="submit"
                                  class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div> -->
          <div class="col-md-12">
              <div class="card card-danger">
                  <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Daftar Kriteria</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                      <table class="table table-sm table-hover table-bordered text-nowrap">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode</th>
                                  <th>Kriteria</th>
                                  <th>Type</th>
                                  <th>Bobot</th>
                                  <th><i class="fas fa-cog"></i></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="item in datas">
                                  <td>{{$index+1}}</td>
                                  <td>{{item.kode}}</td>
                                  <td>{{item.nama}}</td>
                                  <td>{{item.type}}</td>
                                  <td>{{item.bobot}}</td>
                                  <td width=10%>
                                      <button type="button" class="btn btn-info btn-sm" ng-click="showSub(item)"><i
                                              class="fas fa-list"></i></button>
                                      <!-- <button type="button" class="btn btn-warning btn-sm" ng-click="edit(item, 'kriteria')"><i
                                              class="fas fa-edit"></i></button>
                                      <button type="button" class="btn btn-danger btn-sm" ng-click="delete(item, 'kriteria')"><i
                                              class="fas fa-trash"></i></button> -->
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
              </div>
          </div>
        </div>
    </div>
    <div class="col-md-12" ng-show="dialogSub">
        <div class="row">
          <!-- <div class="col-md-4">
              <div class="card card-danger">
                  <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-plus-square fa-1x"></i>&nbsp;&nbsp; Input Sub Kriteria</h3>
                  </div>
                  <div class="card-body">
                      <form role="form" ng-submit="save('Subkriteria')">
                          <div class="form-group">
                              <label for="namaSub" class="col-form-label col-form-label-sm">Sub Kriteria</label>
                              <input type="text" class="form-control  form-control-sm" id="namaSub" ng-model="modelSub.nama"
                                  placeholder="Nama Kriteria" required>
                          </div>
                          <div class="form-group">
                              <label for="inisial" class="col-form-label col-form-label-sm">Inisial</label>
                              <input type="text" class="form-control  form-control-sm" id="inisial" ng-model="modelSub.inisial"
                                  placeholder="Inisial Sub Kriteria" required>
                          </div>
                          <div class="form-group">
                              <label for="bobotSub" class="col-form-label col-form-label-sm">Bobot</label>
                              <input type="number" class="form-control  form-control-sm" id="bobotSub" ng-model="modelSub.bobot"
                                  placeholder="Bobot Kriteria" required>
                          </div>
                          <div class="form-group d-flex justify-content-end">
                              <button type="submit"
                                  class="btn btn-primary btn-sm pull-right">{{simpanSub ? 'Simpan': 'Ubah'}}</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div> -->
          <div class="col-md-12">
              <div class="card card-danger">
                  <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Daftar Sub Kriteria {{subKriteria.nama}}</h3>
                  </div>
                  <div class="card-body table-responsive p-0">
                      <table class="table table-sm table-hover table-bordered text-nowrap">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>SubKriteria</th>
                                  <th>Inisial</th>
                                  <th>Bobot</th>
                                  <!-- <th><i class="fas fa-cog"></i></th> -->
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="item in subKriteria.subkriteria">
                                  <td>{{$index+1}}</td>
                                  <td>{{item.nama}}</td>
                                  <td>{{item.inisial}}</td>
                                  <td>{{item.bobot}}</td>
                                  <!-- <td width=10%>
                                      <button type="button" class="btn btn-warning btn-sm" ng-click="edit(item, 'subkriteria')"><i
                                              class="fas fa-edit"></i></button>
                                      <button type="button" class="btn btn-danger btn-sm" ng-click="delete(item, 'SubKriteria')"><i
                                              class="fas fa-trash"></i></button>
                                  </td> -->
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>