<div class="row" ng-controller="periodeController">
  <div class="col-md-4">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-square fa-1x" ></i>&nbsp;&nbsp; Input Periode</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" ng-submit="save()">
          <div class="form-group">
            <label for="periode" class="col-form-label col-form-label-sm">Periode</label>
            <input type="text" class="form-control  form-control-sm" id="periode" ng-model="model.periode" placeholder="Periode">
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label col-form-label-sm">Periode</label>
            <select class="form-control" ng-model="model.status">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
          </div>
          <div class="form-group d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm pull-right">{{simpan ? 'Simpan': 'Ubah'}}</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-th-list"></i>&nbsp;&nbsp; Daftar Periode</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-sm table-hover table-bordered text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Periode</th>
              <th>Status</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas">
              <td>{{$index+1}}</td>
              <td>{{item.periode}}</td>
              <td>{{item.status == '1' ? 'Aktif' : 'Tidak Aktif'}}</td>
              <td width = 15%>
                <button type="button" class="btn btn-warning btn-sm" ng-click ="edit(item)"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" ng-click ="delete(item)"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
